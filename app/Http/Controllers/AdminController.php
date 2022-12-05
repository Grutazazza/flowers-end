<?php

namespace App\Http\Controllers;

use App\Models\Tovar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tovar()
    {
        $tovars = Tovar::all();
        return view('admin.tovar.index',compact('tovars'));
    }
}
