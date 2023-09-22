<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $donateds = DB::table('donateds')
        ->join('funds', 'donateds.fund_id', '=', 'funds.id')
        ->select('donateds.status', 'donateds.amount', 'funds.title', 'funds.description', 'funds.goals')
        ->where('donateds.user_id', '=', $user->id)
        ->get();

        return view('pages.profile', compact('user', 'donateds'));
    }


}
