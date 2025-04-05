<?php

namespace App\Http\Controllers\Shop\Email;

use App\Http\Controllers\Controller;
use App\Mail\ExampleMail;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ExampleEmailSender extends Controller
{
    public function sendEmail()
    {

        $shops = Shop::all();

        $details = [
            'title' => 'Mail from Laravel',
            'body' => 'This is a test email sent from a Laravel application.',
            'shops' => $shops
        ];        

        try {
            Mail::to('danushkasandagiri@gmail.com')->send(new ExampleMail($details));
            return "Email sent successfully!";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
