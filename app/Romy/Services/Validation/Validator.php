<?php namespace Romy\Services\Validation;

use Hash;
use Validator as LaravelValidator;

use App\Models\User;

abstract class Validator {
  /**
   * Validation errors
   *
   * @var object
   */
  protected $errors = [];

  public function __construct()
  {
    LaravelValidator::extend('old_password_check', function($attributes, $value, $parameters)
    {
      $user = User::find($parameters[0]);
      if (Hash::check($value, $user->password)) {
        // The passwords match...
        return true;
      }
      else {
        return false;
      }
    });

    LaravelValidator::extend('is_youtube', function($attributes, $value, $parameters)
    {
      return isYoutube($value);
    });
  }

  public function validate(array $input, array $rules = [], array $messages = [])
  {
    $rules    = array_merge(static::$rules, $rules);
    // $messages = array_merge(static::$messages, $messages);

    $validator = LaravelValidator::make($input, $rules, $messages);

    if ( ! $validator->passes())
    {
      $this->errors = $validator->messages();

      return false;
    }

    return true;
  }

  /**
   * Return errors
   *
   * @return array
   */
  public function errors()
  {
    return $this->errors;
  }
}