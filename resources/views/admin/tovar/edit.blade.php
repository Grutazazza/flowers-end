@extends('welcome')

@section('title','Редактирование товара'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-12 ">
            <h3>Редактирование товара</h3>
            <form method="PUT" action="{{route('admin.tovar.update',['tovar'=>$tovar->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Наименование товара</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{$tovar->name}}">
                    @error('name')
                    <div id="inputNameValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Цена товара</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{$tovar->price}}">
                    @error('price')
                    <div id="inputPriceValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDesc" class="form-label">Страна</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="inputDesc" name="country" value="{{$tovar->country}}">
                    @error('country')
                    <div id="inputDescValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDesc" class="form-label">Модель</label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror" id="inputDesc" name="model" value="{{$tovar->model}}">
                    @error('model')
                    <div id="inputDescValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDesc" class="form-label">Цвет</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror" id="inputDesc" name="color" value="{{$tovar->color}}">
                    @error('color')
                    <div id="inputDescValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Фото файла</label>
                    <input class="form-control" type="file" id="formFile" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
