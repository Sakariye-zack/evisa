<?php

namespace App\Http\Controllers;

use App\Models\VisaApplication;

class VerifyController extends Controller
{
    public function show(string $code)
    {
        $app = VisaApplication::where('reference_no', $code)->first();
        return view('verify.show', ['app' => $app, 'code' => $code]);
    }
}
