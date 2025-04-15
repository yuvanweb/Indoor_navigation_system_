<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale($lang){

        if (in_array($lang,['en','fr','tn'])) {
            App::setLocale($lang);
            Session::put('locale',$lang);
        }

       // dd(Session::get('locale'));exit;
return back();
    }
}
