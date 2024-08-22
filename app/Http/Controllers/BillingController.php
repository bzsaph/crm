<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BillingController extends Controller
{
    public function createMonthlySubscription(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric',
        ]);

        $monthYear = Carbon::now()->format('Y-m');
        Billing::updateOrCreate(
            ['client_id' => $request->client_id, 'month_year' => $monthYear, 'subscription_type' => 'monthly'],
            ['amount' => $request->amount, 'status' => 'unpaid']
        );

        return redirect()->back()->with('success', 'Monthly subscription created.');
    }

    public function createYearlySubscription(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric',
        ]);

        $monthYear = Carbon::now()->format('Y');
        Billing::updateOrCreate(
            ['client_id' => $request->client_id, 'month_year' => $monthYear, 'subscription_type' => 'yearly'],
            ['amount' => $request->amount, 'status' => 'unpaid']
        );

        return redirect()->back()->with('success', 'Yearly subscription created.');
    }
}
