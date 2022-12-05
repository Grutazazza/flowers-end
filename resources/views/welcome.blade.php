<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
        <script src="{{asset('public/assets/js/bootstrap.bundle.js')}}"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome')}}">Магазин</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('catalog')}}">Каталог</a>
                        </li>

                        @guest {{-- Для незарегестрированных--}}
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                            </li>
                        @endguest
                        @auth {{-- Для зарегестрированных--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">Выход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('basket')}}">Заказы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('newBasket')}}">Корзина</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Контакты</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role=='Администратор') {{-- Для админов--}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Администрирование
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('admin.admTovars')}}">Работа с товаром</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.category.index')}}">Работа с категориями</a></li>
                                        <li><a class="dropdown-item" href="">Все заказы</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
        @yield('content') {{-- поле контента--}}
    </body>
</html>
