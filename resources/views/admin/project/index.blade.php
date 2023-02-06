@extends('layouts.app')

@section('content')
<div class="container  ">
    <h1 class="title-main mt-4">Lista Progetti</h1>
    <div class="row row-cols-6  g-4 ">
        @foreach ($projects as $project)
        <div class="col-4" >
            <div class="card">
                <img src={{asset('/storage/' . $project['cover_img']) }} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$project["name"]}}</h5>
                    <p class="card-text">{{$project["description"]}}</p>
                    <div>Tipologia</div>
                    <ul>
                        <li>{{$project->type->name}}</li>
                    </ul>
                    <div class="d-flex gap-3">
                        <a href="{{route("admin.projects.show",$project->id)}}" class="btn btn-primary">Info</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-secondary">
                            modifica 
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-comic" >
                            @csrf()
                            @method('delete')
              
                            <button class="btn btn-danger">
                              elimina
                            </button>
                          </form>

                    </div>
                    
                </div>
            </div>
                
            
        </div>
        @endforeach

    </div>
    
</div>
@endsection