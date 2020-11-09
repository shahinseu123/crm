<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        "check_oparation", "check_setting", "check_user_delete", "check_user_edit",
        "check_lead", "check_users", "user_id", "check_client", "check_activity",
        "check_user_create", "check_lead_edit", "check_lead_delete", "check_lead_show",
        "check_lead_create", "check_lead_to_client", "check_active_to_inactive", "check_client_edit",
        "check_client_delete", "check_client_show", "check_client_adddoc",
        "check_activity_ready_to_work", "check_client_to_lead",
        "check_client_active_to_inactive", "check_r_one_done_not_done",
        "check_r_two_done_not_done", "check_r_three_done_not_done", "check_activity_working_ready",
        "check_activity_show"
    ];
}
