@extends('layouts.app')

@section('content')
<div class="container  ">
    <h1 class="title-main mt-4">Lista Categorie</h1>
    <div class="row row-cols-6  g-4 ">
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($types as $type)
                    <li class="list-group-item  d-flex justify-content-between align-items-start">
                        
                            {{$type->name}}
                            
                        
                       

                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" >
                                @csrf()
                                @method('delete')
                  
                                <button class="btn btn-danger btn-sm ">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                              </form>
                        
                    </li>
                    @endforeach

                </ul>

            </div>

        </div>

    </div>
    
</div>
@endsection