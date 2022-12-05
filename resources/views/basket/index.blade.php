@extends('welcome')

@section('title','главная страница'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
         <div class="col"></div>
        <div class="col-12">
            <h3>Корзина</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" width="150px">Фото</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tovars as $tovar)
                    <tr>
                        <th scope="row">{{$tovar->id}}</th>
                        <td><img width="350px" src="{{'/storage/app/public/'.$tovar->photo}}" alt=""></td>
                        <td>{{$tovar->name}}</td>
                        <td>{{$tovar->price}}</td>
                        <td style="width: 200px">
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.tovar.edit',['tovar'=>$tovar->id])}}" style="width: 100px">Редактировать</a>
                                <form action="{{route('admin.tovar.destroy',['tovar'=>$tovar->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
