<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::latest()->get();
        return view("admin.project.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        return view("admin.project.create",compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data=$request->validated();
        $data=$request->all();

        if(key_exists("cover_img",$data)){
            $path=Storage::put("posts",$data["cover_img"]);

        }else{
            $path="";
        }
        

        $project=Project::create($data);
        $project->cover_img=$path;
        $project->save();

        return redirect()->route("admin.projects.show",$project->id);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.project.show",compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types=Type::all();
        return view("admin.project.edit",compact("project","types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $data=$request->validated();
        $data=$request->all();
        $project->fill($data);
        if(key_exists("cover_img",$data)){
            $path=Storage::put("posts",$data["cover_img"]);
            Storage::delete($project->cover_img);
            $project->cover_img=$path;
        }

        $project->save();

        return redirect()->route("admin.projects.show",$project->id);

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_img){
            Storage::delete($project->cover_img);
        }
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}
