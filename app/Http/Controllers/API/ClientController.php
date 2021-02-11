<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Lead;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lead::where(['isLead' => 0])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function make_lead($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->isLead = 1;
        $lead->save();
    }

    public function make_r_one_not_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_one_done = 0;
        $cli->save();
    }

    public function make_r_one_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_one_done = 1;
        $cli->save();
    }

    public function make_r_one_working($id){
        $cli = Lead::findOrFail($id);
        $cli->isR_one_done = 2;
        $cli->save();
    }

    public function make_r_two_not_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_two_done = 0;
        $cli->save();
    }

    public function make_r_two_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_two_done = 1;
        $cli->save();
    }

    public function make_r_two_working($id){
        $cli = Lead::findOrFail($id);
        $cli->isR_two_done = 2;
        $cli->save();
    }

    public function make_r_three_not_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_three_done = 0;
        $cli->save();
    }

    public function make_r_three_done($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_three_done = 1;
        $cli->save();
    }
    public function make_r_three_working($id)
    {
        $cli = Lead::findOrFail($id);
        $cli->isR_three_done = 2;
        $cli->save();
    }
}
