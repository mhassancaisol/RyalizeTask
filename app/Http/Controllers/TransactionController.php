<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;

class TransactionController extends Controller
{
    public function totalTransactions(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'location_id' => 'required|exists:locations,location_id',
            'user_id' => 'required|exists:users,id', // Validate user_id
        ]);

       // Fetch total transactions for the specific user, location, and date
        $total = Transaction::whereDate('created_at', $validated['date'])
            ->where('location_id', $validated['location_id'])
            ->where('user_id', $validated['user_id']) // Filter by user
            ->count();
        $userObj = User::find($validated['user_id']);


        return response()->json([
            'total_transactions' => $total,
            'date' => $validated['date'],
            'location_id' => $validated['location_id'],
            'user' => $userObj,
        ]);
    }
}