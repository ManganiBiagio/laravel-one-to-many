@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-6">
            <div class="card">
                <img src={{asset('storage/' . $project['cover_img'])}} class="card-img-top " alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$project["name"]}}</h5>
                    <p class="card-text">
                        <div>
                            <strong>Descrizione:</strong>
                        </div>
                        {{$project["description"]}}
                    </p>
                    <div class="card-text py-3">
                        <ul class="list-group">
                        <li class="list-group-item">Tipologia:{{$project->type->name}}</li>
                        <li class="list-group-item">GitHub Link:  <a href="{{$project["github_link"]}}">{{$project["github_link"]}}</a></li>
                        <li class="list-group-item">Creato il: {{$project["created_at"]}}</li>
                        <li class="list-group-item">Modificato il: {{$project["updated_at"]}}</li>
                      </ul>
                    </div>


                    <div class="d-flex gap-3">
                       
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
    </div>
    
</div>
@endsection