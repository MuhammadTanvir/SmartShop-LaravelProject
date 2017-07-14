<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function manageCategory(){
    	// $users=User::simplePaginate(10);
    	$users=User::paginate(10);
    	return view('admin.user.manageUser',['users'=>$users]);
    }
}
