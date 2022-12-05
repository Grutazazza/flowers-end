@extends('welcome')

@section('title','Просмотр товара'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-12">
            <h3>Просмотр товара {{$tovar->name}}</h3>
            <div class="card" style="width: 100%;">
                <img src="{{asset('/storage/app/public/'.$tovar->photo)}}" class="card-img-top" alt="{{$tovar->name}}">
                <div class="card-body">
                    <h5 class="card-title">Наименование: {{$tovar->name}}</h5>
                    <h5 class="card-title">Цена: {{$tovar->price}} руб</h5>
                    <p class="card-text">Описание: {{$tovar->description}}</p>
                    <p class="card-text">Создано: {{$tovar->created_at}}</p>
                    <p class="card-text">Отредактированно: {{$tovar->updated_at}}</p>
                    <div class="row d-flex justify-content-evenly">
                        <a href="" class="btn btn-primary" style="width: 200px">Добавить в корзину</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
