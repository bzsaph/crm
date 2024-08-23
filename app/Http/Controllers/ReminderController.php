<?php

namespace App\Http\Controllers;

use App\Reminder;
use App\Client;
use App\Billing;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'billing_id' => 'required|exists:billings,id',
            'reminder_date' => 'required|date',
        ]);

        Reminder::create($request->all());
        return redirect()->back()->with('success', 'Reminder set successfully.');
    }

    public function sendReminders()
    {
        // Logic to send reminders
        $reminders = Reminder::where('reminder_date', '<=', now()->toDateString())
                              ->where('email_sent', false)
                              ->get();

        foreach ($reminders as $reminder) {
            // Send email logic
            $reminder->email_sent = true;
            $reminder->save();
        }

        return redirect()->back()->with('success', 'Reminders sent.');
    }
}
