<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->bigInteger('number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('ssn')->nullable();
            $table->text('street_address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('credit_monitoring_site')->nullable();
            $table->string('credit_monitoring_id')->nullable();
            $table->text('credit_monitoring_pass')->nullable();
            $table->string('ssn_doc')->nullable();
            $table->string('address_doc')->nullable();
            $table->string('assignedTo');
            $table->string('createdBy');
            $table->integer('isLead')->default('1');
            $table->integer('isRead')->default('0');
            $table->integer('isActivity')->default('0');
            $table->integer('isActivityDone')->default('0');
            $table->integer('isActive')->default('1');
            $table->integer('isR_one_done')->default('0');
            $table->integer('isR_two_done')->default('0');
            $table->integer('isR_three_done')->default('0');
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
        Schema::dropIfExists('leads');
    }
}
