<?php

namespace App\Http\Controllers;

use App\Models\Donated;
use App\Models\Fund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class DonatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $fundId)
    {
        $fund = Fund::findOrFail($fundId);
        $request->request->add(['fund_id' => $fundId, 'user_id' => auth()->user()->id, 'status' => 'unpaid']);

        $donated = Donated::create($request->all());

        $fund->donateds()->save($donated);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $donated->id,
                'gross_amount' => $donated->amount,
            ),
            'customer_details' => array(
                'username' => auth()->user()->username,
                'fullname' => auth()->user()->fullname,
                'email' => auth()->user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.donate', compact('snapToken', 'fund', 'donated'));

    }

    /**
     * Display the specified resource.
     */
   public function callback(Request $request)
   {
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

    if($hashed == $request->signature_key){
       if($request->transaction_status == 'capture') {
        $donate = Donated::find($request->order_id);
        $donate->update(['status' => 'paid']);
       }
    }
   }
}
