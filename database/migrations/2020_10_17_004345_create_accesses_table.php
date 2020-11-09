<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->boolean('check_oparation')->default(false);
            $table->boolean('check_setting')->default(false);
            $table->boolean('check_lead')->default(false);
            $table->boolean('check_users')->default(false);
            $table->boolean('check_activity')->default(false);
            $table->boolean('check_client')->default(false);
            $table->boolean('check_user_delete')->default(false);
            $table->boolean('check_user_edit')->default(false);
            $table->boolean('check_user_create')->default(false);
            $table->boolean('check_lead_edit')->default(false);
            $table->boolean('check_lead_delete')->default(false);
            $table->boolean('check_lead_show')->default(false);
            $table->boolean('check_lead_create')->default(false);
            $table->boolean('check_lead_to_client')->default(false);
            $table->boolean('check_active_to_inactive')->default(false);
            $table->boolean('check_client_edit')->default(false);
            $table->boolean('check_client_delete')->default(false);
            $table->boolean('check_client_show')->default(false);
            $table->boolean('check_client_adddoc')->default(false);
            $table->boolean('check_activity_ready_to_work')->default(false);
            $table->boolean('check_client_to_lead')->default(false);
            $table->boolean('check_client_active_to_inactive')->default(false);
            $table->boolean('check_r_one_done_not_done')->default(false);
            $table->boolean('check_r_two_done_not_done')->default(false);
            $table->boolean('check_r_three_done_not_done')->default(false);
            $table->boolean('check_activity_working_ready')->default(false);
            $table->boolean('check_activity_show')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
