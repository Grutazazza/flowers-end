@extends('welcome')
@section('title','Товары'){{--Это тайтл--}}
@section('content') {{-- Страница Входа --}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
            <h1>Все товары</h1>
            <div class="row">
                @foreach($tovars as $tovar)
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{asset('/storage/app/public/'.$tovar->photo)}}" class="card-img-top" alt="{{$tovar->name}}">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title">{{$tovar->name}}</h5>
                            <p class="card-text">{{$tovar->price}} руб.</p>
                            <div class="d-flex">
                            <a href="{{route('show',['tovar'=>$tovar->id])}}" class="btn btn-primary" style="width: 120px">Посмотреть</a>
                                @auth
                                    @if(isset(\Illuminate\Support\Facades\DB::table('baskets')->where('user_id',auth()->id())->where('status','Оформляется')->first()->tovar))
                                        @if(!str_contains(\Illuminate\Support\Facades\DB::table('baskets')->where('user_id',auth()->id())->where('status','Оформляется')->first()->tovar,'"'.$tovar->id.'"'))
                                            <a href="{{route('add',['tovar'=>$tovar->id])}}" class="btn btn-warning" style="width: 120px">Добавить</a>
                                        @else
                                            <div class="btn btn-dark" style="width: 120px">Товар в корзине</div>
                                        @endif
                                    @else
                                            <a href="{{route('add',['tovar'=>$tovar->id])}}" class="btn btn-warning" style="width: 120px">Добавить</a>
                                    @endif
                                @endauth
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$tovars->links()}}
        </div>
        <div class="col"></div>
    </div>

</div>
@endsection
