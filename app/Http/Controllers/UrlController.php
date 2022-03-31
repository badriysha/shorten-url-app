<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use PUGX\Shortid\Shortid;

use App\Models\Url;

class UrlController extends Controller
{
    public function create() {
        return view('pages.url.create');
    }

    public function store(UrlRequest $request)
    {
        $data = $request->all();
        $data['code'] = Shortid::generate(7, null, true);

        $url = Url::create($data);
        return redirect()->route('url.create')->with(['url' => url($url->code)]);
    }

    public function show($id)
    {
        $url = Url::find($id);
        $visitors = Visitor::where('url_id', $id)->get();

        return view('pages.url.show', [
           'url' => $url,
            'visitors' => $visitors
        ]);
    }

    public function process($code)
    {
        $url = Url::where('code', $code)->first();

        if (!$url) {
            return redirect()->to('/');
        }

        $visitor = new Agent;
        $url->visitor()->create([
            'visitor_ip' => request()->ip(),
            'visitor_os' => $visitor->platform(),
            'visitor_device' => $visitor->device(),
            'visitor_browser' => $visitor->browser(),
        ]);

        return redirect()->to(url($url->long_url));
    }
}
