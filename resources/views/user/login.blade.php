@extends('layout.flame')
@section('title','Login')
@section('body')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            管理者ログイン
        </div>
        <div class="card-body">
            <form method="POST" action="/master/login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('id') }}" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="パスワード">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>

        </div>
    </div>
@endsection
