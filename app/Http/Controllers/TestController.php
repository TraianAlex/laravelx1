<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TestRepository;
use App\Events\UserHasRegistered;

class TestController extends Controller
{
    // private $repository;

    // public function __construct(TestRepository $repository)
    // {
    // 	    $this->repository = $repository;
    // }
    /**
    * $this->middleware('admin:traian,param2,param3', ['only' => 'admin']);
    */
    public function __construct()
    {
        $this->middleware('admin:traian', ['only' => 'admin']);//:yearly
    }

    public function foo(TestRepository $repository)
    {
    	return $repository->get();
    }
    /**
    * injection
    */
    public function users()
    {
    	return view('auth.users');
    }
    /**
    * test middleware
    */
    public function admin()
    {
        return "This page has been seen only by admins";
    }
    /**
    * event with pusher
    */
    public function broadcast(Request $request)
    {
        $name = $request->input('name');// broadcast/?name=John
        event(new UserHasRegistered($name));//'traian'
        return 'Done';
    }
}