<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\User;
use Illuminate\Http\Request;

class FundController extends Controller
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
        return view('pages.createFund');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'goals' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Fund::create($validatedData);

        return redirect('/')->with('pesan', 'Fund Created!');
    }

    /**
     * Display the specified resource.
     */
    public function showByUser($userId)
    {
        $user = User::find($userId);

        if(!$user) {
            return abort(404);
        }

        $funds = $user->funds;

        return view('pages.myFund', compact('funds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $fund = Fund::find($id);

        if(!$fund) {
            return abort(404);
        }

        return view('pages.showFund', compact('fund'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fund $fund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fund $fund)
    {
        //
    }
}
