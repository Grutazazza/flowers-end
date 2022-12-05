<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Tovar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;

class MainController extends Controller
{
    public function index()
    {
        $tovars = Tovar::simplePaginate(6);
        return view('common.index', compact('tovars'));
    }
    public function show(Tovar $tovar)
    {

        return view('common.show', compact('tovar'));
    }

    public function toBasket(Tovar $tovar)
    {
        if (Basket::all()->where('user_id',Auth::id())->where('status','Оформляется')->isNotEmpty())
        {
            $basket = Basket::all()->where('user_id',Auth::id())->where('status','Оформляется')->first();
            $basket->tovar([[$tovar->id=>1]]);
        }
        else
        {
            $basket['status'] = 'Оформляется';
            $basket['user_id']=Auth::id();
            $item = [[$tovar->id=>1]];
            $basket['tovar'] = $item;
            Basket::create($basket);
        }
        return back()->with(['basket'=>true]);
    }

    public function basket()
    {
        $basket = Basket::all()->where('user_id',Auth::id());
        return view('basket.basket', compact('basket'));
    }

    public function newBasket()
    {
        $basket = Basket::all()->where('user_id',Auth::id())->where('status','Оформляется')->sortByDesc('id')->first();
        if (isset($basket))
        $basket = $basket;
        else
            return view('basket.newBasket');
        return view('basket.newBasket', compact('basket'));
    }

    public function createOrder(Request $request)
    {
        $basket = Basket::all()->where('user_id',Auth::id())->where('status','Оформляется')->sortByDesc('id')->first();
        $basket['status'] = 'В процессе';
        $i = 0;
        $test = [];
        foreach ($request['productsIds'] as $key => $item)
        {
            foreach ($basket['tovar'] as $tovar){
                if (isset($tovar[$key]))
                {
//                    print_r($basket['tovar']);
//                    echo '############';
                    $test[$i] =[$key=>(integer)$item];
//                    $basket->tovar=([[$key=>(integer)$item]]);
//                    print_r($test);
//                    echo $tovar[$key].'   '.$key.'   '.(integer)$item.'|| <br>';
                    $i++;
                }
            }
        }
        $basket->tovar = $test;
        $basket->status ='В процессе';
        $basket->update();
        $basket = Basket::all()->where('user_id',Auth::id());
        return view('basket.basket', compact('basket'));
    }

    public function deny($basket)
    {
        $basket = Basket::find($basket);
        $basket->status ='Отменён';
        $basket->update();
        $basket = Basket::all()->sortBy('updated_at');
        return view('basket.basket', compact('basket'));
    }
    public function orders()
    {
        $basket = Basket::all()->sortBy('updated_at');
        return view('basket.basket', compact('basket'));
    }
    public function contact()
    {
        return view('common.contacts');
    }
}
