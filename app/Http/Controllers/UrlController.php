<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use PUGX\Shortid\Shortid;

class UrlController extends Controller
{
    public function create() {
        return view('layouts.url.index');
    }

    public function store(UrlRequest $request)
    {
        $data = $request->all();
        $data['code'] = Shortid::generate(7);

        $url = Url::create($data);
        return redirect()->route('url.create')->with(['url' => url($url->code)]);
    }

    public function show($id)
    {
        //
    }

    public function process($code)
    {
        $url = Url::where('code', $code)->first();

        if ($url) {
            return redirect()->to(url($url->long_url));
        }
        return redirect()->to('/');
    }
}
