<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::all();
        return view("admin.type.index",compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.type.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $data=$request->validated();
        $data=$request->all();

        $type=Type::create($data);
        $type->save();
        return redirect()->route("admin.types.index");
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy(Request $request)
    
    {
        
        $id=(int) $request->type;
        $destroyAnyway=$request->destroyAnyway;
        
        
        $typeToDelete=Type::findOrFail($id);
        $types=Type::all();
        if(!$typeToDelete->projects->isEmpty()){
            
            if(is_null($destroyAnyway)){
                return view("admin.type.index",[
                    "types"=>$types,
                    "typeToDelete"=>$typeToDelete,
                    "msgError"=>"Stai cercando di cancellare una categoria associata a dei progetti esistenti"]);
                    
            }
            else{
                
                // qui dobbiamo cancellare l'associazione con i progetti nel db
                // $typeToDelete->delete();
                 return redirect()->route("admin.types.index");
            }
        
            }
        $typeToDelete->delete();
        return redirect()->route("admin.types.index");
    }
}
