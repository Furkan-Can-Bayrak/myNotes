@extends('front.layouts.app')


@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
               <li> {{$error}}</li>
            @endforeach
        </ul>
        </div>
    @endif

    <form action="{{route('storeNote')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" >Başlık</label>
            <input type="text" name="title" class="form-control" id="title" >

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
           <textarea name="content" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Oluştur</button>
    </form>



@endsection
