<?php

namespace App\Http\Controllers;

use App\Models\Visas;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use DateTime;
use DateInterval;

class VisasController extends Controller
{
    public function index()
    {
        $visas = Visas::all();
        return view('admin.visa.index',compact('visas'));
    }
    public function create()
    {
        return view('admin.visa.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(str_replace(' ', '_', $data['visa_name']));

        if ($request->hasfile('banner_image'))
            $data['banner_image'] = $this->saveFile($request->banner_image, 'images\visa');
        if ($request->hasfile('tile_img'))
            $data['tile_img'] = $this->saveFile($request->tile_img, 'images\visa');

        Visas::create($data);
        
        return redirect()->route('visa.index')->with('message','Visa Created Successfully!');
    }
    protected static function saveFile($file_data, $path): string
    {
       
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }
        $file = $file_data;

        $name = round(microtime(true) * 10000). '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $name);
        return $name;
    }
    public function edit($id)
    {
        $visa = Visas::find($id);
        return view('admin.visa.edit',compact('visa'));

    }
    public function update(Request $request)
    {
        // $request->document_required = str_replace("h6","h5",$request->document_required);
        $visa = Visas::find($request->id);
        $visa->visa_name = $request->visa_name;
        $visa->slug = str_replace(' ', '-',strtolower($visa->visa_name));
        $visa->visa_type = $request->visa_type;
        $visa->entry_type = $request->entry_type;
        $visa->continent = $request->continent;
        $visa->processing_time = $request->processing_time;
        $visa->adult_selling_price = $request->adult_selling_price;
        $visa->child_selling_price = $request->child_selling_price;
        $visa->infant_sell_price = $request->infant_sell_price;
        $visa->status = $request->status;


        $visa->description = $request->description;
        $visa->important_note = $request->important_note;
        $visa->document_required = $request->document_required;
        
        $visa->faq = json_encode($request->question). json_encode($request->answer);
        
        if ($request->hasFile('banner_image'))
            $visa->banner_image = $this->saveFile($request->banner_image, 'images\visa');
        if ($request->hasFile('tile_img'))
            $visa->tile_img = $this->saveFile($request->tile_img, 'images\visa');
        $visa->save();
        return redirect()->route('visa.index')->with('message','Visa Edited Successfully!');

    }
    public function delete($id)
    {
        Visas::where('id',$id)->delete();
        return redirect()->route('visa.index')->with('message','Visa Deleted Successfully!');
    }
}
