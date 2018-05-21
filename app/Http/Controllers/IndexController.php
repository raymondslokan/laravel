<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    protected function index()
    {
        $data['body'] = 'index.index';
        return view('common.layout',$data);
    }
}
