<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!\Auth::check()) {
            return view('welcome');
        }


        return view('website.home');

    }

}
