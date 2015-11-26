<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\TestRepository;

class TestController extends Controller
{
    // private $repository;

    // public function __construct(TestRepository $repository)
    // {
    // 	$this->repository = $repository;
    // }

    public function foo(TestRepository $repository){
    	return $repository->get();
    }
}