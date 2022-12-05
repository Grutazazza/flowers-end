@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-16">
                <div class="border-1 border rounded-3 p-3">
                    @if(session()->has('errorCreate'))
                        <div class="alert alert-danger mt-2">Нельзя создать заказ без товаров!</div>
                    @endif
                    <h2 class="mt-3">Корзина</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Картинка</th>
                            <th scope="col">Наименование</th>
                            <th scope="col">Стоимость за штуку</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Общая стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($basket))
                                <?php $allPrice = 0; ?>
                            <form method="post">
                                @csrf
                                @foreach($basket['tovar'] as $product)
                                    <tr>
                                        <td><img width="350px" alt='' src="{{ '/storage/app/public/'.\App\Models\Tovar::find(array_keys($product)[0])->photo }}"></td>
                                        <td>{{ \App\Models\Tovar::find(array_keys($product)[0])->name }}</td>
                                        <td>{{ \App\Models\Tovar::find(array_keys($product)[0])->price }} руб.</td>
                                        <td><input type="number" name="productsIds[{{array_keys($product)[0]}}]" class="form-control" value="{{ $product[array_keys($product)[0]] }}"></td>
                                        <td>{{ \App\Models\Tovar::find(array_keys($product)[0])->price*$product[array_keys($product)[0]] }} руб.</td>
                                            <?php $allPrice += (\App\Models\Tovar::find(array_keys($product)[0])->price*$product[array_keys($product)[0]]); ?>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        Общая стоимость товаров: {{ $allPrice }} руб.
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <input type="text" class="hiding" hidden name="basket" value="{{$basket->id}}">
                                        <button class="btn btn-primary" type="submit">Сохранить изменения</button>
                                    </td>
                                </tr>
                            </form>
                        @else
                            <tr>
                                <td colspan="5">Вашей корзине нет товаров!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
