<?php

namespace App\Http\Controllers;

use App\Http\Resources\WalletResource;
use App\Models\Currency;
use App\Models\Wallet;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // echo Auth::user()->id;
      $wallets=  WalletResource::collection(Wallet::where('user_id',Auth::user()->id)->get());

       return $wallets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $currency = Currency::where('id',$request->get('currency_id'))->first();
        if($user==$request->get('user_id') && $currency){
            $wallet =Wallet::where('currency_id',$request->get('currency_id'))->first();
            if($wallet)
                return   ['message'=>'Wallet aready exist','status'=>0];
            $wallet= Wallet::create([
                'user_id'=> $request->get('user_id'),
                'currency_id'=>$request->get('currency_id'),
                'balance'=>0
            ]);
            if($wallet)
            return
                ['message'=>'wallet created','status'=>$wallet];
            else
                return  ['message'=>'Failed','status'=>0];
        }else
            return  ['message'=>'invalid','status'=>0];
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
