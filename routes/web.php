<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    $teamName = config('app.name');
    if (Storage::disk('public')->exists('config.json')) {
        $config = json_decode(Storage::disk('public')->get('config.json'), true);
        config(['app.name' => $config['name']]);
        $teamName = config('app.name') ?? 'TrioX - TEAM';
    }

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

    $directories = Storage::disk('public')->directories();
    $projects = [];
    if (count($directories) > 0) {
        foreach ($directories as $key => $directory) {
            try {
                $data = json_decode(Storage::disk('public')->get("$directory/data.json"), true);
                $projects[$key] = $data + [
                    'directory' => $directory,
                ];
            } catch (\Throwable $th) {
                continue;
            }
        }
    }

    $data = [
        'members' => $members,
        'menu' => $menu,
        'teamName' => $teamName,
        'projects' => $projects,
    ];

    app()->setLocale(Session::get('locale', 'en'));

    return view('index', $data);
})->name('home');

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

Route::match(['GET', 'POST'], '/admin/settings', function (Request $request) {

    if ($request->isMethod('GET')) {
        $teamName = config('app.name');
        if (Storage::disk('public')->exists('config.json')) {
            $config = json_decode(Storage::disk('public')->get('config.json'), true);
            $teamName = $config['name'];
        }

        $directories = Storage::disk('public')->directories();
        $projects = [];
        if (count($directories) > 0) {
            foreach ($directories as $key => $directory) {
                try {
                    $data = json_decode(Storage::disk('public')->get("$directory/data.json"), true);
                    $projects[$directory] = $data;
                } catch (\Throwable $th) {
                    continue;
                }
            }
        }

        return view('admin.settings', [
            'teamName' => $teamName,
            'projects' => $projects,
        ]);
    }

    if ($request->get('type') === 'change_name') {

        $name = $request->get('name') ?? null;

        try {
            $object = new \stdClass();
            $object->name = $name;
            $object->teamName = $name . ' - TEAM';

            $jsonData = json_encode($object);
            Storage::disk('public')->put('config.json', $jsonData);

        } catch (\Throwable $th) {
            abort(500, $th->getMessage());
        }
    } else {
        $data = $request->all();
        $data = Arr::except($data, ['_token', 'type']);

        foreach ($data as $key => $value) {
            if (Storage::disk('public')->exists($key)) {
                continue;
            } else {
                try {
                    Storage::disk('public')->makeDirectory($key);
                    $item = new \stdClass();
                    $item->title = $value['title'] ?? null;
                    $item->link = $value['link'] ?? null ;
                    $item->description = $value['description'] ?? null;
                    $item->cate = $value['cate'] ?? 'web';
                    $images = [];
                    foreach ($value['images'] as $j => $image) {
                        try {
                            $image = $request->file("{$key}.images.{$j}");
                            $path = Storage::disk('public')->put("/$key", $image);
                            $images[] = $path;
                        } catch (\Throwable $th) {
                            continue;
                        }
                    }
                    $item->images = $images;

                    $jsonData = json_encode($item);
                    Storage::disk('public')->put("/$key/data.json", $jsonData);
                } catch (\Throwable $th) {
                    continue;
                }
            }
        }
    }

    return redirect()->back();
})->name('settings');

Route::post('/delete', function (Request $request) {
    $projectId = $request->get('project_id');
    if (Storage::disk('public')->exists($projectId)) {
        Storage::disk('public')->deleteDirectory($projectId);
    }
    return redirect()->back();
})->name('delete');


Route::get('/detail/{id}', function (Request $request, $id) {
    app()->setLocale(Session::get('locale', 'en'));

    $menu = [
        'home', 'about', 'skill', 'service', 'portfolio', 'contact'
    ];
    $teamName = config('app.name');
    if (Storage::disk('public')->exists('config.json')) {
        $config = json_decode(Storage::disk('public')->get('config.json'), true);
        $teamName = $config['name'];
    }

    try {
        $projectData = json_decode(Storage::disk('public')->get("$id/data.json"), true);
    } catch (\Throwable $th) {
        abort(404);
    }

    return view('detail', [
        'menu' => $menu,
        'isDetail' => true,
        'teamName' => $teamName,
        'project' => $projectData,
    ]);
})->name('detail');
