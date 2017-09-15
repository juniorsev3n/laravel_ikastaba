<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class AlumniController extends Controller
{
    //
public function _construct()
    {
    	$this->middleware($this->guestMiddleware(), ['except' => 'list']);
    }

    public function list(Request $request)
    {
    	$list = User::leftJoin('jurusans', 'users.jurusan', '=', 'jurusans.id')
    				->where('jurusan', '>', 0)
    				->where('status', '<>', 0);
    	if($request->get('q'))
    		{
    			$list = $list->whereRaw("users.nama_lengkap like '%".$request->q."%'");
    		}
    	$list = $list->paginate(8);
    	return view ('alumni.list', compact('list'));
    }

    public function dashboard()
    {
    	if(\Auth::check())
    	{
    		return view('alumni.dashboard');
    	}
    	else{
    		throw new \Exception("You Cant Access Here", 200);
    		
    	}
    }

    public function responden()
    {
        return view('alumni.responden');
    }
}
