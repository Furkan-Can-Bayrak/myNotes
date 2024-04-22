@extends('front.layouts.app')


@section('content')

    @section('content')


    <form action="{{route('updateNote')}}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{$note->id}}">
        <div class="mb-3">
            <label for="title" class="form-label" >Başlık</label>
            <input type="text" name="title" value="{{$note->title}}" class="form-control" id="title" >

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea name="content" class="form-control">{{$note->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Oluştur</button>
    </form>

@endsection
