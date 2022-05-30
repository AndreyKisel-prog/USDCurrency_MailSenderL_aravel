<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FrontControler extends Controller
{
    public function index()
    {
        $currencyUSD = Http::get('https://www.cbr-xml-daily.ru/daily_json.js')['Valute']['USD']['Value'];
//        (json_decode($res->body(), true)['Valute']['USD']['Value']);
//        (($res->json())['Valute']['USD']['Value']);
        return Mail::send(
            ['text' => 'layouts.mail'],
            compact('currencyUSD'),
            function ($message) {
                $message->to('examle@yandex.ru')->subject('Важная тема');
                $message->from('examle@yandex.ru', 'Prince of zimvabve');
            }
        );
    }
}
