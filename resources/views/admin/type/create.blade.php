@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nuova Categoria</h1>

    <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
  
      <div class="mb-3">
        <label class="form-label">Nome Categoria</label>
        <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" name="name" value="{{old("name")}}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      
  
      <button class="btn btn-primary" type="submit">Salva progetto</button>
    </form>
</div>
@endsection