<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $lastProjects=Project::latest()->take(3)->get();
        return view("welcome",compact("lastProjects"));
    }
}
