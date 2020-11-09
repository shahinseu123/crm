<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'number', 'dob', 'ssn', 'street_address',
        'city', 'state', 'zip', 'credit_monitoring_site', 'credit_monitoring_id',
        'credit_monitoring_pass', 'isLead', 'assignedTo', 'createdBy'
    ];
}
