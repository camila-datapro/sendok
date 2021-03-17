<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function refreshCaptcha(){
        return response()->json(['captcha' => captcha_img()]);
    }
}
