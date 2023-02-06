@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Nuovo Progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
  
      <div class="mb-3">
        <label class="form-label">Nome Progetto</label>
        <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" name="name" value="{{old("name")}}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <input type="text" class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror" name="description" value="{{old("description")}}">
        @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Tipoliga</label>
        <select class="form-select @error('type_id') is-invalid @enderror" name="type_id">
          <option></option>
          {{-- Per ogni elemento all'interno di $categories, stampo una option --}}
          @foreach ($types as $type)
          <option value={{ $type->id }}>{{ $type->name }}</option>
          @endforeach
        </select>
        @error('type_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label class="form-label">Immagine</label>
        <input type="file" class="form-control @error('cover_img') is-invalid  @enderror" name="cover_img" >
         @error('cover_img')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Github link</label>
        <input type="text" class="form-control @error('github_link') is-invalid @elseif(old('github_link')) is-valid @enderror" name="github_link" value="{{old("github_link")}}">
        @error('github_link')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
  
      <button class="btn btn-primary" type="submit">Salva progetto</button>
    </form>
</div>
@endsection