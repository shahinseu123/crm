<?php

namespace App\Http\Controllers\API;

use App\Access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
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
        $setting = Access::where('user_id', Auth::user()->id)->get();
        // $setting = Access::all();
        // return $setting;
        return response()->json($setting);
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
            'user_id' => 'required'
        ]);
        if (Access::where('user_id', $request->user_id)->count() === 0) {
            $access = new Access();
            $access->user_id = $request->user_id;
            if ($request->check_oparation) {
                $access->check_oparation = $request->check_oparation;
            }

            if ($request->check_setting) {
                $access->check_setting = $request->check_setting;
            }

            if ($request->check_lead) {
                $access->check_lead = $request->check_lead;
            }

            if ($request->check_users) {
                $access->check_users = $request->check_users;
            }

            if ($request->check_activity) {
                $access->check_activity = $request->check_activity;
            }
            if ($request->check_client) {
                $access->check_client = $request->check_client;
            }
            if ($request->check_user_delete) {
                $access->check_user_delete = $request->check_user_delete;
            }
            if ($request->check_user_edit) {
                $access->check_user_edit = $request->check_user_edit;
            }
            if ($request->check_user_create) {
                $access->check_user_create = $request->check_user_create;
            }
            if ($request->check_lead_edit) {
                $access->check_lead_edit = $request->check_lead_edit;
            }
            if ($request->check_lead_delete) {
                $access->check_lead_delete = $request->check_lead_delete;
            }
            if ($request->check_lead_show) {
                $access->check_lead_show = $request->check_lead_show;
            }
            if ($request->check_lead_create) {
                $access->check_lead_create = $request->check_lead_create;
            }
            if ($request->check_lead_to_client) {
                $access->check_lead_to_client = $request->check_lead_to_client;
            }
            if ($request->check_active_to_inactive) {
                $access->check_active_to_inactive = $request->check_active_to_inactive;
            }
            if ($request->check_client_edit) {
                $access->check_client_edit = $request->check_client_edit;
            }
            if ($request->check_client_delete) {
                $access->check_client_delete = $request->check_client_delete;
            }
            if ($request->check_client_show) {
                $access->check_client_show = $request->check_client_show;
            }
            if ($request->check_client_adddoc) {
                $access->check_client_adddoc = $request->check_client_adddoc;
            }
            if ($request->check_activity_ready_to_work) {
                $access->check_activity_ready_to_work = $request->check_activity_ready_to_work;
            }
            if ($request->check_client_to_lead) {
                $access->check_client_to_lead = $request->check_client_to_lead;
            }
            if ($request->check_client_active_to_inactive) {
                $access->check_client_active_to_inactive = $request->check_client_active_to_inactive;
            }
            if ($request->check_r_one_done_not_done) {
                $access->check_r_one_done_not_done = $request->check_r_one_done_not_done;
            }
            if ($request->check_r_two_done_not_done) {
                $access->check_r_two_done_not_done = $request->check_r_two_done_not_done;
            }
            if ($request->check_r_three_done_not_done) {
                $access->check_r_three_done_not_done = $request->check_r_three_done_not_done;
            }
            if ($request->check_activity_working_ready) {
                $access->check_activity_working_ready = $request->check_activity_working_ready;
            }
            if ($request->check_activity_show) {
                $access->check_activity_show = $request->check_activity_show;
            }

            $access->save();
        } else {
            $access = Access::where('user_id', $request->user_id);
            $access->update($request->all());
            // foreach ($access as $value) {
            //     if ($value->user_id === $request->user_id) {
            //         return $value->user_id;
            //         $req = Access::findOrFail($request->user_id);
            //         return $req;
            //     }
            // }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $setting = Access::where('user_id', Auth::user()->id)->get();
        // return response()->json($setting);
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
}
