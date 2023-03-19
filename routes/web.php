<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $members = [
        [
            'name' => 'Trần Minh Tiến',
            'skill' => 'Android Native (Java/Kotlin), iOS (Swift), Design UI/UX, NodeJS, Python, C++, Tool, Negotiate ...',
            'image' => 'user-1.png',
            'link-cv' => 'https://www.topcv.vn/xem-cv/BwcABg9RVwBVBlZVUVUBBQMLB1NXXAMKUAVUVAfe8a',
        ],
        [
            'name' => 'Trần Thiện Chí',
            'skill' => 'Java (Backend/server), Kotlin (Server side), NodeJS, Python, C++, Hack, Mod game, Devops, Tool ...',
            'image' => 'user-2.png',
            'link-cv' => 'https://www.topcv.vn/xem-cv/BANeUlMAAg8BBFlSUAJXBlYEXQxRAQdUBA1SUAc3b9',
        ],
        [
            'name' => 'Phạm Văn Minh',
            'skill' => 'PHP (Laravel, Wordpress), Symfony, HTML, CSS, JavaScript (VueJS, ReactJs), Python, Java, Tool ...',
            'image' => 'user-3.png',
            'link-cv' => 'https://www.topcv.vn/xem-cv/A1ZVAgoCUAYEUAdcBFFTA1YEBgBSUQMBBgNXXw9ddb',
        ],
    ];

    $menu = [
        'home', 'about', 'skill', 'service', 'portfolio', 'contact'
    ];


    $data = [
        'members' => $members,
        'menu' => $menu,
    ];

    app()->setLocale(Session::get('locale', 'en'));

    return view('index', $data);
});

Route::get('/components', function () {
    return view('components.someCode');
});

Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', function ($locale) {
        if (!in_array($locale, ['en', 'vi'])) {
            abort(400);
        }

        Session::put('locale', $locale);
        App::setLocale($locale);
        app()->setLocale($locale);

        return redirect()->back();
    })->name('change-language');
});

