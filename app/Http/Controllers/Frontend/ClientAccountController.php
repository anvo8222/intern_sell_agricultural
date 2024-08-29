<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use App\Models\Frontend\UserModel;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Http\Requests\Frontend\Profile\ProfileRequest;
use App\Http\Requests\Frontend\Profile\ChangePasswordRequest;
use App\Http\Requests\Frontend\Auth\ForgotPasswordRequest;
use App\Http\Requests\Frontend\Auth\ChangePassworForgotdRequest;
use Alert;


class ClientAccountController extends Controller
{
  public function formLogin()
  {
    return view('frontend.auth.login');
  }
  public function login(request $request)
  {
    $login = [
      'email' => $request->email,
      'password' => $request->password,
      'level' => 0,
    ];
    if (Auth::attempt($login)) {
      if (Auth::user()->status === 'active') {
        return redirect(route('home'));
      } else {
        return redirect()->back()->withInput()->withErrors([
          'err_active' => "bạn chưa kích hoạt tài khoản <a href='/active-account/$request->email'>đây</a>",
        ]);
      }
    } else {
      return redirect()->back()->withInput()->withErrors([
        'err_login' => 'Email hoặc mật khẩu không chính xác!',
      ]);
    }
    // dd($request->all());
  }
  //if user login but accout no active
  public function activeLogin($email)
  {

    $user = UserModel::where('email', $email)->first();
    $data = [
      'name' => $user->name,
      'token' => $user->token,
      'userId' => $user->id
    ];

    try {
      Mail::to("puchipuchi8222@gmail.com")->send(new RegisterMail($data));
      return redirect(route('user-login'))->with([
        'register-success' => 'Vui lòng kiểm tra Email để kích hoạt tài khoản!',
      ]);
    } catch (Exception $th) {
    }
  }

  public function formRegister()
  {
    return view('frontend.auth.register');
  }
  public function register(RegisterRequest $request)
  {
    // dd($request->all());
    $user = new UserModel();
    $token = Str::random(20);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->token = $token;
    if ($user->save()) {
      $userId = (UserModel::where('email', $request->email)->first())->id;
    }
    $data = [
      'name' => $request->name,
      'token' => $token,
      'userId' => $userId
    ];
    try {
      Mail::to($request->email)->send(new RegisterMail($data));
      return redirect(route('user-login'))->with([
        'register-success' => 'Đăng ký thành công! Vui lòng kiểm tra Email để kích hoạt tài khoản!',
      ]);
    } catch (Exception $th) {
    }
  }
  public function active($id, $token)
  {
    $user = UserModel::findOrFail($id);
    if ($user->token == $token) {
      $user->status = 'active';
      if ($user->update()) {
        //delete token
        $user->token = null;
        $user->update();
        return redirect(route('user-login'))->with([
          'register-active-sucess' => 'Kích hoạt tài khoản thành công! Vui lòng đăng nhập!',
        ]);
      }
    } else {
      return redirect(route('user-login'))->withErrors([
        'register-active-err' => 'Không hợp lệ! Vui lòng kiểm tra lại!',
      ]);
    }
  }
  public function logout()
  {
    if (Auth::check()) {
      Auth::logout();
    }
    return redirect(route('home'));
  }

  public function formProfile()
  {
    $user = Auth::user();
    return view('frontend.dashboard.profile.profile', compact('user'));
  }

  public function updateProfile(ProfileRequest $request)
  {
    $userId = Auth::id();
    $user = UserModel::findOrFail($userId);
    $data = $request->all();
    $file = $request->avatar;
    if (!empty($file)) {
      $data['avatar'] = time() . $file->getClientOriginalName();
    }
    if ($user->update($data)) {
      if (!empty($file)) {
        $file->move('upload/frontend/avatar', $data['avatar']);
      }
      Alert::success('Bạn đã cập nhật thành công!');
      return redirect()->back();
    } else {
      Alert::success('Bạn đã cập nhật thất bại!');
      return redirect()->back();
    }
  }
  public function showFormPassword()
  {
    return view('frontend.dashboard.profile.changePassWord');
  }
  public function updatePassword(ChangePasswordRequest $request)
  {
    $userId = Auth::id();
    $user = UserModel::findOrFail($userId);
    if (Hash::check($request->newPassword, $user->password)) {
      $user->password = Hash::make($request->newPassword);
      $user->update();
      Alert::success('Bạn đã cập nhật thành công!');
      return redirect()->back();
    } else {
      Alert::error('Mật khẩu cũ không chính xác');
      return redirect()->back();
    }
  }

  public function formForgotPassword()
  {
    return view('frontend.auth.forgotPassword');
  }
  public function forgotPassword(ForgotPasswordRequest $request)
  {
    $user = UserModel::where('email', $request->email)->first();
    if ($user) {
      if ($user->status == 'active') {
        $token = Str::random(20);
        $user->token = $token;

        if ($user->save()) {
          $data = [
            'name' => $user->name,
            'token' => $token,
            'userId' => $user->id
          ];
          try {
            Mail::to($request->email)->send(new ForgotPasswordMail($data));
            return redirect()->back()->with(
              'forgot-success',
              'Xác nhận thành công! Vui lòng kiểm tra Email để lấy lại mật khẩu!',
            );
          } catch (Exception $th) {
          }
        }
      } else {
        return redirect()->back()->withInput()->with("err", "Tài khoản chưa được kích hoạt! vui lòng kiểm tra email để kích hoạt tài khoản");
      }
    } else {
      return redirect()->back()->withInput()->with("err", "Email không khớp trong hệ thống!");
    }
  }
  public function formChangePassword($id, $token)
  {
    // $idUser = $id;
    // $tokenUser = $token;
    return view('frontend.auth.changeforgotPassword', compact('id', 'token'));
  }
  public function changePassword(ChangePassworForgotdRequest $request, $id, $token)
  {
    $user = UserModel::findOrFail($id);

    if ($user->token == $token) {
      $user->password = Hash::make($request->password);
      if ($user->update()) {
        //delete token
        $user->token = null;
        $user->update();
        return redirect(route('user-login'))->with([
          'register-active-sucess' => 'Đổi mật khẩu thành công! Vui lòng đăng nhập!',
        ]);
      }
    } else {
      return redirect(route('user-login'))->withErrors([
        'register-active-err' => 'Không hợp lệ! Vui lòng kiểm tra lại!',
      ]);
    }
  }
}