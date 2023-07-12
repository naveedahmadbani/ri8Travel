<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visas;
use App\Models\Lead;
use App\Models\User;

class LeadController extends Controller
{
    //
    
    public function index(Request $request)
    {
        if(auth()->user()->role == 'admin')
        {
            $leads = json_decode(json_encode(
                Lead::orderBy('id','desc')
                    ->join('users', 'leads.assign_to', '=', 'users.id')
                    ->select('leads.*', 'users.name as assigned_to_name')
                    ->get()
                ,true),true);
        }else if(auth()->user()->role == 'agent')
        {
            $leads = json_decode(json_encode(
                Lead::orderBy('id','desc')->where('assign_to',auth()->user()->id)
                    ->join('users', 'leads.assign_to', '=', 'users.id')
                    ->select('leads.*', 'users.name as assigned_to_name')
                    ->get()
                ,true),true);
        }
        return view('admin.lead.list',compact('leads'));

    }
    public function createLead()
    {
        $visas = json_decode(json_encode(Visas::select('id','visa_name','slug')->get(),true),true);
        return view('admin.lead.create',compact('visas'));

    }
    public function storeLead(Request $request)
    {
        $lead  = new Lead;
        $lead->visa = $request->slug;
        $lead->assign_to = auth()->user()->id;
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->special_request = $request->special_request??'';
        $lead->status = 'pending';
        $lead->save();
        return redirect()->route('lead.list')->with('message','Leads Creted and assign to '.auth()->user()->name.'!');

    }
    public function visaRequest(Request $request)
    {
        $lead  = new Lead;
        $lead->visa = $request->slug;
        $lead->name = $request->name;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->special_request = $request->special_request??'';
        $lead->status = 'pending';
        $lead->save();

        $visa = json_decode(json_encode(Visas::where('slug', $request->slug)->first(),true),true);

        return view('visa.summary',compact('visa'));
    }
    public function assignLead(Request $request)
    {
        Lead::whereIn('id',json_decode($request->lead_list))->update(['assign_to' => $request->user]);
        $user = User::where('id',$request->user)->first('name')->name;

        return redirect()->route('home')->with('message','Leads Assigned to '.$user.'!');

    }
    public function leadStatusUpdate(Request $request)
    {
        Lead::find($request->lead_id)->update(['status'=>$request->status]);
        return true;
    }
}
