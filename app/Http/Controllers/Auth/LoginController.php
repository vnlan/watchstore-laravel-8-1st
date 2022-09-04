<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function getLogin()
    {
       return view('admin.auth-check.login');
    }
    public function postLogin(Request $request)
    {
       
        $rules = [
            'username' =>'required|min:1',
            'password' => 'required|min:1'
        ];
        $messages = [
            'username.required' => 'Username là trường bắt buộc',
            'username.min' => 'Username phải chứa ít nhất 1 ký tự',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 1 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('admin.auth.login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $username = $request->username;
            $password = $request->password;
     
            if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return redirect('/admin');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route('admin.auth.login');
            }
        }
    }
    
}