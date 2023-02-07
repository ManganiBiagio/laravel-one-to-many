@extends('layouts.app')

@section('content')

<div class="container">
  
    <h1>Modifica Progetto</h1>

    <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
  
      <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" name="name" value="{{old("name") ?  old("name") : $project->name}}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror     
      </div>
      <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea name="description" cols="30" rows="5" class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror">{{old("description") ?  old("description") :  $project->description }}</textarea>
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
          <option value={{ $type->id }} {{$project->type_id===$type->id ? "selected":""}}>{{ $type->name }}</option>
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
        <input type="file" class="form-control @error('cover_img') is-invalid ) is-valid @enderror" name="cover_img" >
        @error('cover_img')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">github link</label>
        <input type="text" class="form-control @error('github_link') is-invalid @elseif(old('github_link')) is-valid @enderror" name="github_link" value="{{old("github_link") ?  old("github_link") :  $project->github_link }}">
        @error('github_link')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
  
      <button class="btn btn-primary" type="submit">Salva modifica prodotto</button>
    </form>
</div>
@endsection