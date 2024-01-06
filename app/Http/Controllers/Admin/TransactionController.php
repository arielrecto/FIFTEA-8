<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::with('order.cart')->get();
        $totalOnline = $this->getTotalTransactionByOrderType($transactions->toArray(), 'online');
        $totalWalkin = $this->getTotalTransactionByOrderType($transactions->toArray(), 'walk_in');

        // dd(compact(['transactions', 'totalOnline', 'totalWalkin']));

        return view('users.admin.transaction.index', compact(['transactions', 'totalOnline', 'totalWalkin']));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::whereId($id)->with(['order.user'])->first();

       return view('users.admin.transaction.show', compact(['transaction']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    private function getTotalTransactionByOrderType($transactions, $type){

        $total = 0;

        foreach($transactions as $transaction) {

            if($transaction['order']['type'] === $type){
                $total = $total + 1;
            }
        }

        return $total;
    }
}
