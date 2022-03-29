<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $urls = Url::where('user_id', auth()->id())->paginate(10);
        return view('pages.dashboard', [
            'urls' => $urls
        ]);
    }
}
