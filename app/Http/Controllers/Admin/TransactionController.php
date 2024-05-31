<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Transaction = Transaction::with('user')->select('id', 'slug','user_id', 'name', 'email', 'phone', 'address', 'courier', 'total_price', 'status', 'payment', 'payment_url')->latest()->get();
        return view('pages.admin.transaction.index', compact(
            'Transaction'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $Transaction = Transaction::with('product')->when('transaction_id', $id)->get;
        return view('pages.admin.transaction.show', compact(
            'transaction'
        ));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data transaction by id
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Get data transaction by id
        $transaction = Transaction::findOrFail($id);
        try {
            $transaction->update([
                'status' => $request->status
            ]);
            return redirect()->route('admin.transaction.index')->with('success', 'Updated');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.transaction.index')->with('error', 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showTransactionUseAdminWithSlugAndId($id, $slug)
    {
        $transaction = Transaction::where('id', $id)->where('slug', $slug)->first();

        // dd($transaction);

        return view('pages.admin.transaction.show', compact(
            'transaction'
        ));
    }
}
