<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index(Request $request, $id){

        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id); 
        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id){
        $travel_package = TravelPackage::findOrFail($id);
        $transaction = Transaction::create([
            'travel_packages_id' => $travel_package->id,
            'user_id' => auth()->user()->id,
            'additional_visa' => 0,
            'additional_total' => $travel_package->price,
            'transaction_status' => 'IN_CART',
            // 'transaction_date' => Carbon::now()->format('Y-m-d H:i:s'),


         ]);

         TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(Auth::user()->id)
         ]);

         return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id){

        $request->validate([
            'username' => 'required|string|exists:users,username',
            // 'nationality' => 'required|string',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required|date|after_or_equal:today',
           
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa){
            // $transaction->additional_total = $transaction->additional_total + 190;
            $transaction->additional_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->additional_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function remove(Request $request, $detail_id){

        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transaction_id);
        
        if($item->is_visa){
            // $transaction->additional_total = $transaction->additional_total + 190;
            $transaction->additional_total -= 190;
            $transaction->additional_visa -= 190;
        }
      
        $transaction->additional_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }



    public function success(Request $request, $id){

        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = "PENDING";
        $transaction->save();
        return view('pages.success');
    }
}
