<?php

namespace App\Repository\user_repository;

use App\Interfaces\user_interface\UserInterface;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserRepository
{
    public function store_user($data)
    {
        // $user = new User();
        // $user->name = $data->name;
        // $user->email = $data->email;
        // $user->number = $data->number;
        // $user->type = $data->type;
        // $user->password = Hash::make($data->password);
        // $user->save();
        User::crate($data->all());
    }
}
