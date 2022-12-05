@extends('welcome')
@section('title','Регистрация'){{--Это тайтл--}}
@section('content') {{-- Страница Регистрации --}}
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-10 mb-3 h3">Поля отмеченные <span class="text-danger">*</span> обязательны для заполнения!</div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail3"  value="{{old('email')}}">
                            @error('email')
                            <div id="invalidEmail" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputname" class="col-sm-2 col-form-label">Имя <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputname"  value="{{old('name')}}">
                            @error('name')
                            <div id="invalidname" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputsurname" class="col-sm-2 col-form-label">Фамилия <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" id="inputsurname"  value="{{old('surname')}}">
                            @error('surname')
                            <div id="invalidsurname" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputpatronymic" class="col-sm-2 col-form-label">Отчество </label>
                        <div class="col-sm-10">
                            <input type="text" name="patronymic" class="form-control @error('patronymic') is-invalid @enderror" id="inputpatronymic"  value="{{old('patronymic')}}">
                            @error('patronymic')
                            <div id="invalidpatronymic" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputlogin" class="col-sm-2 col-form-label">Логин <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputlogin"  value="{{old('login')}}">
                            @error('login')
                            <div id="invalidlogin" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Повторите пароль <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input @error('confirmation_polity') is-invalid @enderror" name="confirmation_polity" type="checkbox" id="gridCheck1" aria-describedby="invalidPasswordConfirmationFeedback">
                            <label class="form-check-label" for="gridCheck1">
                                Я согласен
                            </label>
                            @error('confirmation_polity')
                                <div id="invalidInputFile" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
