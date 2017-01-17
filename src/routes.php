<?php
/**
 * Created by PhpStorm.
 * User: John Kagga
 * Date: 1/16/2017
 * Time: 11:01 PM
 */



use Kagga\Telco\facades\Telco;

Illuminate\Support\Facades\Route::get('/telco/send', function () {

    return view('telco::send');
});

Illuminate\Support\Facades\Route::post('/telco/send', function (\Kagga\Telco\contracts\TelcoInterface $telco) {

    $phonenumber = request('tel');

    $message = request('message');

    $results = $telco->send($phonenumber, $message);

    $results = Telco::send($phonenumber, $message);

    if ($results != null) {

        return "Message has been sent successful to " . $phonenumber;
    }
});
