<?php namespace App\Controllers\Admin;

use BaseController;

use Input, Redirect, Session, Sentry, Validator, View, Hash;

use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserNotActivatedException;
use Cartalyst\Sentry\Users\UserNotFoundException;

use Illuminate\Support\MessageBag as Bag;

class AuthController extends BaseController {

  public function getIndex()
  {
    return View::make('admin.auth.index');
  }

  public function getLogout()
  {
    Sentry::logout();

    return Redirect::route('admin.login');
  }

  public function postLogin()
  {
    $rules = array(
      'email'    => 'required|email',
      'password' => 'required|min:5'
    );

    $input = Input::all();
    $v = Validator::make($input, $rules);

    if (!$v->fails()) {
      try {
        $credentials = array(
            'email'    => $input['email'],
            'password' => $input['password']
        );

        $user = Sentry::authenticate($credentials, false);

        if ($user) {
          return Redirect::route('admin.dashboard');
        }
      }
      catch (WrongPasswordException $e)
      {
        $error = 'Invalid Username Or Password';
      }
      catch (UserNotFoundException $e)
      {
        $error = 'Invalid Username Or Password';
      }
      catch (UserNotActivatedException $e)
      {
        $error = 'Invalid Username Or Password';
      }

      $errors = with(new Bag)->add('login', $error);

      return Redirect::route('admin.login')
                     ->withErrors($errors)
                     ->withInput();
    }

    return Redirect::route('admin.login')
                   ->withErrors($v)
                   ->withInput();

  }

  public function getChangePassword()
  {
    return View::make('admin.site.change-password');
  }

  public function postChangePassword()
  {
    $rules = array(
      'old_password' => 'required',
      'password'     => 'required|min:5|confirmed' 
    );

    $input = Input::all();
    $v = Validator::make($input, $rules);

    if ($v->fails()) {
      return Redirect::route('admin.change-password')->withErrors($v)->withInput();
    }

    try {
      $user = Sentry::getUser();

      if ($user->checkPassword($input['old_password'])) {
        $user->password = $input['password'];
        $user->save();

        Session::flash('success', 'You have successfully changed your password');

        return Redirect::route('admin.change-password');
      } 
      else {
        $error = "Invalid old password";
        $errors = with(new bag)->add('password', $error);
        return Redirect::route('admin.change-password')
                       ->withErrors($errors)
                       ->withInput();
      }
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
      return Redirect::route('admin.logout');
    }
  }
}