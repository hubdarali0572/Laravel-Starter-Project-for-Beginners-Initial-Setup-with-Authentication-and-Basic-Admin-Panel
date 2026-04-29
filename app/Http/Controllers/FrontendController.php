<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //

    public function home()
    {
        // dd('Frontend Home Page');
        return view('Frontend.pages.home');
    }
    

    // contact form

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string',
            'email'        => 'required|email',
            'phone'        => 'required|string',
            'user_message' => 'nullable|string',
        ]);

        // Optional: send email
        $htmlMessage = '
                        <div style="
                            max-width:600px;
                            margin:20px auto;
                            padding:30px;
                            border-radius:15px;
                            background: linear-gradient(135deg, #ff7e5f, #feb47b);
                            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                            font-family: Arial, sans-serif;
                            color:#333;
                        ">
                            <h2 style="color:#fff; text-align:center; margin-bottom:20px; font-size:24px;">New Contact Form Submission</h2>
                            <div style="
                                background:#fff;
                                padding:20px;
                                border-radius:10px;
                                border-left: 6px solid #ff5a00;
                                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                            ">
                                <p><strong>Name:</strong> ' . htmlspecialchars($data['name']) . '</p>
                                <p><strong>Email:</strong> ' . htmlspecialchars($data['email']) . '</p>
                                <p><strong>Phone:</strong> ' . '+92'. htmlspecialchars($data['phone'] ?? 'N/A') . '</p>
                                <p><strong>Message:</strong></p>
                                <p style="
                                    padding:15px;
                                    background:#f9f9f9;
                                    border-radius:5px;
                                    border:1px solid #eee;
                                ">' . nl2br(htmlspecialchars($data['user_message'])) . '</p>
                            </div>
                            <p style="text-align:center; margin-top:20px; color:#fff; font-size:14px;">
                                This message was sent via Anzway Institutes Contact Form
                            </p>
                        </div>
                        ';

        // Send email to admin
        Mail::html($htmlMessage, function ($message) use ($data) {
            $message->to($data['email'])  // admin email
                ->subject('Contact Form: ' . $data['name']);
        });

        // Return back with submitted data to display in card
        return back()->with([
            'success' => 'Your message has been sent successfully!',
            'submitted' => $data
        ]);
    }


    // registration form
    public function sendRegistration(Request $request)
    {
        // Validate the registration form
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'program' => 'required|string|in:O-Level,A-Level',
            'gender' => 'required|in:Male,Female',
            'message' => 'nullable|string|max:1000',
        ]);

        // Create HTML email content (beautiful card style)
        $htmlMessage = '
                    <div style="
                        max-width:600px;
                        margin:20px auto;
                        padding:30px;
                        border-radius:15px;
                        background: linear-gradient(135deg, #ff7e5f, #feb47b);
                        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                        font-family: Arial, sans-serif;
                        color:#333;
                    ">
                        <h2 style="color:#fff; text-align:center; margin-bottom:20px; font-size:24px;">New Student Registration</h2>
                        <div style="
                            background:#fff;
                            padding:20px;
                            border-radius:10px;
                            border-left: 6px solid #ff5a00;
                            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                        ">
                            <p><strong>Full Name:</strong> ' . htmlspecialchars($data['name']) . '</p>
                            <p><strong>Email:</strong> ' . htmlspecialchars($data['email']) . '</p>
                            <p><strong>Gender:</strong> ' . htmlspecialchars($data['gender']) . '</p>
                            <p><strong>Phone:</strong> ' . '+92'.htmlspecialchars($data['phone']) . '</p>
                            <p><strong>Program:</strong> ' . htmlspecialchars($data['program']) . '</p>
                            <p><strong>Additional Notes:</strong></p>
                            <p style="
                                padding:15px;
                                background:#f9f9f9;
                                border-radius:5px;
                                border:1px solid #eee;
                            ">' . nl2br(htmlspecialchars($data['message'] ?? 'N/A')) . '</p>
                        </div>
                        <p style="text-align:center; margin-top:20px; color:#fff; font-size:14px;">
                            This message was sent via Anzway Institutes Student Registration Form
                        </p>
                    </div>
                    ';

        // Send email to admin
        Mail::html($htmlMessage, function ($message) use ($data) {
            $message->to($data['email'])  // admin email
                ->subject('New Student Registration: ' . $data['name'])
                ->from('anzwaylearning@gmail.com', 'Anzway Institutes');
        });

        // Return back with success and submitted data
        return back()->with([
            'success' => 'Your registration has been submitted successfully!',
            'submitted' => $data
        ]);
    }
}
