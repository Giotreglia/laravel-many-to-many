@extends('layouts.admin')

@section('content')
    <form class="my-3" method="POST" action="{{ route('admin.technologies.update', ['technology' => $technology->slug]) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <div>
                <span>Nome originale</span>
                <span>{{ old($technologies->title) }}</span>
            </div>
            <label for="title" class="form-label">Nome modificato</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <button type="reset" class="btn btn-warning">Annulla</button>

    </form>
@endsection
