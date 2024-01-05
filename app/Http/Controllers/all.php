<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\voucher;

class all extends Controller
{
    public function save(Request $request){
        $voucher = new voucher;
        $voucher->payee = $request->payee;
        $voucher->particulars = $request->particulars;
        $voucher->amount = $request->amount;
        $voucher->save();
        return redirect('/dashboard');
    }

    public function dashboard(){
        $voucher = voucher::all();
        return view('dashboard',['voucher'=>$voucher]);
    }
}
