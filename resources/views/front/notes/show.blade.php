@extends('front.layouts.app')


@section('content')


    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @elseif($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif


    <div class="container">
        <div>
    <h1>{{$note->title}}</h1>
            <a href="{{route('editNote',$note->uuid)}}" class="btn btn-primary float-end">Düzenle</a>
        </div>
<div>
        <p>{{$note->content}}</p>
</div>
    </div>


@endsection

