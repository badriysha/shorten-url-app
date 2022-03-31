<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $urls = Url::with('user')->paginate(10);
        return view('pages.admin.url', [
            'urls' => $urls
        ]);
    }

    public function user() {
        $users = User::withCount('url')->paginate(10);

        return view('pages.admin.user', [
            'users' => $users
        ]);
    }
}
