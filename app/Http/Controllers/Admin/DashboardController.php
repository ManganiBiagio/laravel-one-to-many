<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){

        $users=User::all();
        $projects=Project::all();

        return view("admin.dashboard",[
            "users"=>$users,
            "projects"=>$projects
        ]);
    }
}
