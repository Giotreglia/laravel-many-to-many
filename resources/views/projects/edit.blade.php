@extends('layouts.admin')

@section('content')
    <form class="my-3" method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" id="floatingTextarea" class="form-control @error('description') is-invalid @enderror"
                id="description" name="description">
            {{ old('description', $project->description) }}
        </textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Url immagine</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                value="{{ old('image', $project->image) }}">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client" class="form-label">Prezzo</label>
            <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client"
                value="{{ old('client', $project->client) }}">
            @error('client')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Selezione tipologia</label>
            <select class="form-select" @error('type_id') is-invalis @enderror name="type_id" id="type_id">
                <option @selected(old('type_id') == '') value="">Nessuna categoria</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <button type="reset" class="btn btn-warning">Annulla</button>

    </form>
@endsection
