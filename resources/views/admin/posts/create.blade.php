@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-2">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" name="title" id="title">
                        <p class="invalid-feedback" id="error-title"></p>
                    </div>

                    <div class="form-group">
                        <select name="category_id" id="category">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Descrizione</label>
                        <textarea name="content" class="form-control @error('title') is-invalid @enderror" id="content" cols="50"
                            rows="10">{{ old('content') }}</textarea>
                        <p class="invalid-feedback" id="error-content"></p>
                    </div>

                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <input type="checkbox" id="{{ $tag->name }}" value="{{ $tag->id }}" name="tags[]"
                                @if (in_array($tag->id, old('tags', []))) checked @endif>
                            <label class="mr-3" for="{{ $tag->name }}">{{ $tag->name }}</label>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection