@extends('welcome')

@section('title','Корзина'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-12 ">
            <h3>Заказы</h3>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                @forelse($basket as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order_{{ $item->id }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                <div class="p-1">Номер заказа: {{ $item->id }}</div>
                                @if($item->status == 'Заблокирован'||$item->status == 'Отменён')
                                    <div class="bg-danger text-white ml-1 p-1 rounded-2">Статус: {{ $item->status }}</div>
                                @elseif($item->status == 'Выполнен')
                                    <div class="bg-success text-white ml-1 p-1 rounded-2">Статус: {{ $item->status }}</div>
                                @else
                                    <div class="bg-secondary text-white ml-1 p-1 rounded-2">Статус: {{ $item->status }}</div>
                                @endif
                            </button>
                        </h2>
                        <div id="order_{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название товара</th>
                                        <th scope="col">Стоимость товара</th>
                                        <th scope="col">Количество</th>
                                        <th scope="col">Общая сумма</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $summa = 0; ?>
                                    @foreach($item->tovar as $product => $count)
                                        <?php $summa += ($count[array_keys($count)[0]]*\Illuminate\Support\Facades\DB::table('tovars')->where('id',array_keys($count)[0])->first()->price); ?>
                                        <tr>
                                            <th scope="row">{{ $product }}</th>
                                            <td>{{ \Illuminate\Support\Facades\DB::table('tovars')->where('id',array_keys($count)[0])->first()->name }}</td>
                                            <td>{{ \Illuminate\Support\Facades\DB::table('tovars')->where('id',array_keys($count)[0])->first()->price }}</td>
                                            <td>{{ $count[array_keys($count)[0]] }}</td>
                                            <td>{{ number_format(($count[array_keys($count)[0]]*\Illuminate\Support\Facades\DB::table('tovars')->where('id',array_keys($count)[0])->first()->price), 2, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="5">Общая стоимость за весь заказ: {{ number_format($summa, 2, ',', ' ') }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                                <ul class="list-group">
                                    <li class="list-group-item">Заказ номер: {{ $item->id }}</li>
                                    <li class="list-group-item">Статус заказа: {{ $item->status }}</li>
                                    <li class="list-group-item">Дата заказа: {{ $item->created_at }}</li>
                                    <li class="list-group-item">Дата изменения: {{ $item->updated_at }}</li>
                                </ul>
                                    @if(Auth::user()->role == 'Администратор'&&$item->status!='Отменён'&&$item->status!='Заблокирован'&&$item->status!='Выполнен')
                                        <a href="{{ route('deny', ['basket' => $item->id]) }}" class="btn btn-danger mb-1">Отменить</a>
                                    @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">Вы не сделали не одного заказ!</div>
                @endforelse
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
