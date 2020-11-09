<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadStore;
use App\Model\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead = Lead::where('isLead', 1)->orderBy('id', 'desc')->get();
        return $lead;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|unique:leads",
            "street_address" => "required",
            "city" => "required",
            "state" => "required",
            "zip" => "required",
            "assignedTo" => "required"
        ]);

        $leads = new Lead();
        $leads->first_name = $request->first_name;
        if ($request->middle_name) {
            $leads->middle_name = $request->middle_name;
        }
        $leads->last_name = $request->last_name;
        $leads->email = $request->email;
        if ($request->number) {
            $leads->number = $request->number;
        }
        if ($request->dob) {
            $leads->dob = $request->dob;
        }
        if ($request->ssn) {
            $leads->ssn = $request->ssn;
        }
        $leads->street_address = $request->street_address;
        $leads->city = $request->city;
        $leads->state = $request->state;
        $leads->zip = $request->zip;
        if ($request->credit_monitoring_site) {
            $leads->credit_monitoring_site = $request->credit_monitoring_site;
        }
        if ($request->credit_monitoring_id) {
            $leads->credit_monitoring_id = $request->credit_monitoring_id;
        }
        if ($request->credit_monitoring_pass) {
            $leads->credit_monitoring_pass = $request->credit_monitoring_pass;
        }
        $leads->assignedTo = $request->assignedTo;
        $leads->createdBy = Auth::user()->name;
        // $leads->createdBy = Auth::user()->name;
        $leads->save();
        // doc 

        // doc end 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return $lead;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leads = Lead::findOrFail($id);
        $leads->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lead::findOrFail($id)->delete();
    }

    public function make_active($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->isActive = 1;
        $lead->save();
    }
    public function make_inactive($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->isActive = 0;
        $lead->save();
    }

    public function make_client($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->isLead = 0;
        $lead->save();
    }

    public function make_activity($id)
    {

        $lead = Lead::findOrFail($id);
        $lead->isActivity = 1;
        $lead->save();
    }

    public function make_activity_to_lead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->isActivity = 0;
        $lead->save();
    }
}
