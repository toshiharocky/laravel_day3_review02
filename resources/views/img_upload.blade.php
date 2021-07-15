@extends('layouts.app')
@section('content')

    @if ($errors->any())
    <div class='errors'>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ url('/img/upload') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary">送信する</button>
    </form>
    
    @if($user->imgurl)
        <img src="/uploads/{{ $user->imgurl }}" style=width:300px>
    
    @endif


@endsection