<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $product = Product::where('name', 'LIKE', "%$search%")->orwhere('code', 'LIKE', "%$search%")->get();
        } else {
            $product = Product::orderBy('display_order_no')->get();
        }

        return view('home', compact('product', 'search'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
