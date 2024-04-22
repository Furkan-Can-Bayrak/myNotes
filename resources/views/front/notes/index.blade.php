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



    <h1>İNDEX SAYFASI</h1>

    <a class="btn btn-primary" href="{{route('createNote')}}">Not Oluştur</a>

    <div class="container">
    @foreach($notes as $note)

            <a href="{{route('showNote', $note->uuid)}}"> <div class="card p-2 ">
            <div class="card-title text-black text-decoration-none">
            {{$note->title}}
            </div>
            <div class="card-body text-black text-decoration-none">
            {{Str::limit($note->content,120)}}
            </div>
            <div class="opacity-50 text-muted">
                {{$note->updated_at->diffForHumans()}}
            </div>
             </div> </a>
    @endforeach
        {{$notes->links()}}
    </div>

@endsection

