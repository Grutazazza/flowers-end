@extends('welcome')

@section('title','Категории'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        <div class="row h4 d-flex justify-content-center mt-1 p-2">
            Создать новую категорию:
            <a href="{{route('admin.category.create')}}" class="btn btn-primary m-4">Создать</a>
        </div>
        @if(session()->has('successDelete'))
            <div class="alert alert-danger">Категория успешно удалена!</div>
        @endif
        <div class="col"></div>
        <div class="col-12 d-flex flex-column align-items-center">
            <h3>Страница товаров</h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorys as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td style="width: 200px">
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.category.edit',['category'=>$category->id])}}" style="width: 100px">Редактировать</a>
                                <form action="{{route('admin.category.destroy',['category'=>$category->id])}}" method="POST">
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
