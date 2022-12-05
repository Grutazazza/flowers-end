@extends('welcome')
@section('title','Авторизация'){{--Это тайтл--}}
@section('content') {{-- Страница Входа --}}
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Авторизация пользователя</h1>
                @auth
                    <div class="alert alert-success">Вы успешно авторизованы.</div>
                @endauth
                @guest
                    @error('auth')
                    <div class="alert alert-danger">Логин или пароль не верный</div>
                    @enderror
                    <form method="POST" >
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Логин <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputEmail3"  value="{{old('login')}}">
                                @error('login')
                                <div id="invalidEmail" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Пароль <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3"  value="{{old('password')}}">
                                @error('password')
                                <div id="invalidEmail" class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
