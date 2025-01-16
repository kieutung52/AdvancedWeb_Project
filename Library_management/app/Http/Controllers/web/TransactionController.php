<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.ad_transaction.transaction', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.ad_transaction.update', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->returned = true;
        $transaction->save();

        return redirect()->route('ad_transaction.transactions')->with('success', 'Transaction completed successfully.');
    }

    public function checkAndUpdateStatus()
    {
        $transactions = Transaction::all();

        foreach ($transactions as $transaction) {
            $dueDate = Carbon::parse($transaction->due_date);

            if ($transaction->status !== 'Returned') { // Nếu giao dịch chưa được hoàn thành
                if ($dueDate->isToday()) {
                    $transaction->status = 'In period'; // Trong thời gian hợp lệ
                } elseif ($dueDate->isPast()) {
                    $transaction->status = 'Overdue'; // Quá hạn
                }
            }

            $transaction->save();
        }
    }
}
