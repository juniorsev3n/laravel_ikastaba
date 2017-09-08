<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use App\Http\Requests;

class PagesController extends Controller
{
    //
    public function tentang()
    {
    	$data = Page::where('slug', 'tentang')->first();
    	return view('paging.show', compact('data'));
    }

    public function kontak()
    {
    	$data = Page::where('slug', 'kontak')->first();
    	return view('paging.contact', compact('data'));
    }

    public function show($slug)
    {
    	$data = Page::where('slug', $slug)->first();
        if(isset($data))
        {
    	   return view('paging.show', compact('data'));
        }
        else{
            return response()->view('errors.404');
        }
    }
}
