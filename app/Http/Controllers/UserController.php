<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::leftJoin('leads', 'leads.assign_to', '=', 'users.id')
            ->select('users.*', DB::raw('COUNT(leads.assign_to) as leads'))
            ->where('users.id', '!=', auth()->user()->id)
            ->groupBy('users.id','users.name','users.email','users.email','users.role','users.status','users.image',
            'users.email_verified_at','users.password','users.remember_token','users.created_at','users.updated_at')
            ->get();

        $users = json_decode(json_encode($users));
        return view('admin.user.index',compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('image'))
            $data['image'] = $this->saveFile($request->image, 'images/user');
            
        try {
            User::create($data);
            return redirect()->route('user.index')->with('message','User Created Successfully!');

        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if ($errorCode == 1062) {
                // Duplicate entry error
                return redirect()->back()->with('error' , 'Email address already exists');
            } else {
                return redirect()->back()->with('error' , 'Database error');
            }
        }
    }
    protected static function saveFile($file_data, $path): string
    {
       
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }
        $file = $file_data;

        $name = round(microtime(true) * 10000). '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $name);
        return $path.'/'.$name;
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));

    }
    public function update(Request $request)
    {
        // $request->document_required = str_replace("h6","h5",$request->document_required);
        $user = User::find($request->id);

        $data = $request->all();
        $data['password'] = $request->password ? Hash::make($request->password) : $user->password;

        if ($request->hasFile('image'))
            $data['image'] = $this->saveFile($request->image, 'images/user');

        $user->update($data);

        return redirect()->route('user.index')->with('message','User Edited Successfully!');

    }
    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user.index')->with('message','User Deleted Successfully!');
    }
}
