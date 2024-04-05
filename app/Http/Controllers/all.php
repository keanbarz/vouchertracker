<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\voucher;


use Illuminate\Support\Facades\Log;

class all extends Controller
{
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
                $voucher = voucher::where('isObligation','1')->orderBy('id', 'desc')->get();
                return view('dashboard-o',['voucher'=>$voucher]);
                break;

            case 'entry':
                $voucher = voucher::where('isEntry','1')->orderBy('id', 'desc')->get();
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
                $voucher = voucher::where('isObligation','0')->where('isEntry','0')->where('isRanca','0')->orderBy('id', 'desc')->get();
            return view('forward',['voucher'=>$voucher]);
            break;

            case 'budget':
                $voucher = voucher::where('isObligation','1')->where('isEntry','0')->where('isRanca','0')->orderBy('id', 'desc')->get();
                return view('forward',['voucher'=>$voucher]);
                break;
            case 'entry':
                $voucher = voucher::where('isEntry','1')->where('isRanca','0')->orderBy('id', 'desc')->get();
                return view('forward',['voucher'=>$voucher]);
                break;            
        }    
    }

    public function submitforward(Request $request){
        $itemIds = $request->input('data_id', []);
        \Log::info($itemIds);

        foreach ($itemIds as $itemId) {
            $selectedValue = $request->input("forward_{$itemId}",3);       
            switch ($selectedValue) {
                case 0:
                    $voucher = voucher::find($itemId);
                    $voucher->save();
                    $voucher->isObligation="1";
                    $voucher->save();
                    $voucher->remarks = $voucher->remarks . "<br>Forwarded for Obligation by " . (Auth::user()->name) . " on " . ($voucher->updated_at);
                    $voucher->save();
                        break;
                case 1:
                    $voucher = voucher::find($itemId);
                    $voucher->save();
                    $voucher->isEntry="1";
                    $voucher->save();
                    $voucher->remarks = $voucher->remarks . "<br>Forwarded for Entry by " . (Auth::user()->name) . " on " . ($voucher->updated_at);
                    $voucher->save();
                        break;
                default:
                    break;
            }
        }
        return redirect()->back()->with('success', 'Form submitted successfully');
    }

}
