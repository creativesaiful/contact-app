<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendSMSJob;
use Toastr;

class SMSController extends Controller
{
    public function sendSMS(Request $request)
    {


        $validated = $request->validate([
            'message' => 'required',
            'subject' => 'required',
        ]);

        $message = $request->message;
        $subject = $request->subject;
        $data = $request->all();

        // Filter out the phone numbers for which the checkboxes are checked
        $selectedPhoneNumbers = [];
        foreach ($data as $key => $value) {
            // Assuming the name attributes of the checkboxes are the phone numbers
            if ($value === 'on') {
                $selectedPhoneNumbers[] = $key;
            }
        }

        // Dispatch a job to send SMS to the selected phone numbers
        // foreach ($selectedPhoneNumbers as $phoneNumber) {
        //     SendSMSJob::dispatch($phoneNumber, $message, $subject);
        // }

        Toastr::success('SMS sending job queued successfully', 'Success');
        return redirect()->back();
    }
}
