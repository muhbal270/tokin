<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return view('backend.template.index');
    }   

    public function create()
    {
        return view('backend.template.create');
    }

    public function edit()
    {
        return view('backend.template.edit');
    }
}
