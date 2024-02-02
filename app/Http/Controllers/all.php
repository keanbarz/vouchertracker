<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\voucher;
use App\Models\obligation;
use App\Models\entry;

class all extends Controller
{
    //Receiving

    public function save(Request $request){
        $voucher = new voucher;
        $voucher->payee = $request->payee;
        $voucher->particulars = $request->particulars;
        $voucher->amount = $request->amount;
        $voucher->save();
        $voucher->remarks = "Received By " . (Auth::user()->name) . " on " . ($voucher->created_at);
        $voucher->save();
        return redirect('/dashboard');
    }

    public function dashboard(){
        switch (Auth::user()->role) {
            case 'admin':
                $voucher = voucher::orderBy('id', 'desc')->get();
                return view('dashboard',['voucher'=>$voucher]);
                break;

            case 'budget':
                $voucher = obligation::orderBy('id', 'desc')->get();
                return view('dashboard-o',['voucher'=>$voucher]);
                break;

            default:
                return view('default-dashboard');
                break;
        }
        
    }

    public function forward(){
        switch (Auth::user()->role) {
            case 'admin':
                $voucher = voucher::where('is_forwarded','0')->orderBy('id', 'desc')->get();
            return view('forward',['voucher'=>$voucher]);
            break;

            case 'budget':
                $voucher = obligation::where('is_forwarded','0')->orderBy('id', 'desc')->get();
                return view('forward',['voucher'=>$voucher]);
                break;
        }    
    }

    public function submitforward(Request $request){
        $itemIds = $request->input('data_id', []);

        foreach ($itemIds as $itemId) {
            $selectedValue = $request->input("forward_{$itemId}",3);       
            
            switch ($selectedValue) {
                case 0:
                    $forward = voucher::find($itemId);
                    $voucher = new obligation;
                    $voucher->voucherId = $forward->id;
                    $voucher->payee = $forward->payee;
                    $voucher->particulars = $forward->particulars;
                    $voucher->amount = $forward->amount;
                    $voucher->save();
                    $forward->is_forwarded="1";
                    $forward->save();
                    $forward->remarks = $forward->remarks . "<br>Forwarded for Obligation by " . (Auth::user()->name) . " on " . ($forward->updated_at);
                    $forward->save();
                        break;
                case 1:
                    $forward = voucher::find($itemId);
                    $voucher = new entry;
                    $voucher->voucherId = $forward->id;
                    $voucher->payee = $forward->payee;
                    $voucher->particulars = $forward->particulars;
                    $voucher->amount = $forward->amount;
                    $voucher->save();
                    $forward->is_forwarded="1";
                    $forward->save();
                    $forward->remarks = $forward->remarks . "<br>Forwarded for Entry by " . (Auth::user()->name) . " on " . ($forward->updated_at);
                    $forward->save();
                        break;
                default:
                    break;
            }
        }
        return redirect()->back()->with('success', 'Form submitted successfully');
    }

    //Obligation



}
