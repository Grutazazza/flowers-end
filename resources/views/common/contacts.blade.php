@extends('welcome')
@section('title', 'Контакты')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h3>Страница контактов</h3>
        <div class="row mt-2">
            <div class="col d-flex flex-column align-items-center">
                <img class="w-50" src="/storage/app/public/map.jpg" alt="">
                <div class="list-group w-50">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Наш адрес</h5>
                        </div>
                        <small>Челябинск, ул. Энтузиастов 17</small>
                    </a>
                </div>
                <div class="list-group w-50">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Наш номер телефона</h5>
                        </div>
                        <small>+7 (800) 555-35-35</small>
                    </a>
                </div>
                <div class="list-group w-50">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Наша электронная почта</h5>
                        </div>
                        <small>worldflowers@gmail.com</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
