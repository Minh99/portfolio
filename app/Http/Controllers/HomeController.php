<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        App::setLocale($language);
        Session::put('locale', $language);

        return redirect()->back();
    }
}
