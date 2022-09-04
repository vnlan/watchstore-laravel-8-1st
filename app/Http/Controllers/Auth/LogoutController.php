<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
		
	public function getLogout() {
		Auth::logout();
		return redirect()->route('admin.auth.login');
	}

}