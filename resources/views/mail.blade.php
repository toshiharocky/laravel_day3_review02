@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
@endpush
@section('content')
<h2>メールだよ</h2>
<form action="{{ url('/mail/send') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Eメールアドレス</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Eメールアドレス">
            <small class="text-muted">あなたのメールは他の誰とも共有しません</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">サンプルテキスト</label>
            <input type="text" class="form-control" name="text" id="exampleInputEmail1" placeholder="送りたい文字列">
        </div>
    <button type="submit" class="btn btn-primary">送信する</button>
</form>

@endsection
