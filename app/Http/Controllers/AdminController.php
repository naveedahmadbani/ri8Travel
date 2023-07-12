<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function index()
    {
        if(isset(auth()->user()->role))
        {
            if(auth()->user()->role == 'agent')
            {
                $id = auth()->user()->id;
                $leads = json_decode(json_encode(Lead::where('status','pending')->where('assign_to',$id)->orderBy('id','desc')->get(),true),true);
                $data['all_leads'] = json_decode(json_encode(Lead::where('assign_to',$id)->get()->count(),true),true);
                $data['all_p_leads'] = json_decode(json_encode(Lead::where('status','pending')->where('assign_to',$id)->get()->count(),true),true);
                $data['all_r_leads'] = json_decode(json_encode(Lead::where('status','rejected')->where('assign_to',$id)->get()->count(),true),true);
                $data['all_s_leads'] = json_decode(json_encode(Lead::where('status','success')->where('assign_to',$id)->get()->count(),true),true);
                $users = json_decode(json_encode(User::where('role','agent')->get(),true),true);

                return view('admin.agent_dasboard',compact('leads','data','users'));

            }else if(auth()->user()->role == 'admin')
            {
                $leads = json_decode(json_encode(Lead::whereNull('assign_to')->orderBy('id','desc')->get(),true),true);
                $data['all_leads'] = json_decode(json_encode(Lead::get()->count(),true),true);
                $data['all_p_leads'] = json_decode(json_encode(Lead::where('status','pending')->get()->count(),true),true);
                $data['all_r_leads'] = json_decode(json_encode(Lead::where('status','rejected')->get()->count(),true),true);
                $data['all_s_leads'] = json_decode(json_encode(Lead::where('status','success')->get()->count(),true),true);
                $users = json_decode(json_encode(User::where('role','agent')->get(),true),true);

                return view('admin.dashboard',compact('leads','data','users'));
            }else
            {
                return redirect()->route('u.home');
            }

        }else{
            return redirect()->route('u.home');
        }
    }
}
