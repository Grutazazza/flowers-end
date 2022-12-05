@extends('welcome')

@section('title','главная страница'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-12">
            <h3>Создание товара</h3>
            <form method="POST" action="{{route('admin.tovar.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Наименование товара</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                    @error('name')
                    <div id="inputNameValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Цена товара</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price">
                    @error('price')
                    <div id="inputPriceValidation" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputDesc" class="form-label">Описание товара</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="inputDesc" name="description">
                    @error('description')
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
