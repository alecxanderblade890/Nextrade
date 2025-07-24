<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Don't forget to import the Mail facade
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function sendMessage(Request $request, $email)
    {
        $messageContent = $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $recipientEmail = $email; // Replace with the actual recipient email

        $messageContent = $messageContent['message']; // Extract the message content from the validated data

        try {
            Mail::to($recipientEmail)->send(new MessageMail( $messageContent));
            return redirect()->route('pages.home')->with('success', 'Email successfully sent!');
        } catch (\Exception $e) {
            // Log the error or return an error message
            return redirect()->route('pages.home')->with('failed', 'Email did not sent, Something went wrong!');
        }
    }

    // You can also send to multiple recipients:
    public function sendEmailToMultipleRecipients()
    {
        $users = [
            ['email' => 'user1@example.com', 'name' => 'Alice'],
            ['email' => 'user2@example.com', 'name' => 'Bob'],
        ];

        foreach ($users as $user) {
            Mail::to($user['email'])->send(new MessageMail(''));
        }

        return "Emails sent to multiple recipients.";
    }
}
