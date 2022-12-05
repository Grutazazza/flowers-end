@extends('welcome')
@section('title','О нас')
@section('content')
    <div class="container d-flex flex-column align-items-center">
        <div class="col mb-4 d-flex flex-column align-items-center w-50">
            <img src="/storage/app/public/logo.jpg" width="200px" alt="">
            <h5>Наш девиз</h5>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi aperiam consectetur ducimus eveniet laudantium minus modi porro tempora. Blanditiis dolorum et eum eveniet explicabo repudiandae, unde. Ipsam, natus, sunt?</p>
        </div>
        <h5>Новинки компании</h5>
        <div class="row mt-2">
            @foreach($tovars as $tovar)
                <div class="card m-3" style="width: 15rem;">
                    <img src="{{'/storage/app/public/'.$tovar->photo}}" height="143px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$tovar->name}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
