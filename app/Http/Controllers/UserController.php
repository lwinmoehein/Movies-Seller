<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CopyItem;
use App\User;
class UserController extends Controller
{
    //
    public function index(Request $request){
        $users = User::orderBy('updated_at','desc')->withCount('purchasedCopyItems')->paginate(8);
        return view('admin.users.index',compact('users'));
    }
}
