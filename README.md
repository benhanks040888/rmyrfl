L4-Starter
==========

This is my starter kit for Laravel 4.

### What It Includes

  * [Sentry](https://github.com/cartalyst/sentry): A framework agnostic authentication & authorization system.
  * [Intervention Image](https://github.com/Intervention/image): PHP Image manipulation library.
  * [Bourbon](http://bourbon.io/): A simple and lightweight mixin library for Sass.
  * [Bootstrap](http://getbootstrap.com/): Frontend framework for developing responsive, mobile-first project.
  * [jQuery](http://jquery.com/): Your life is harder without it.
  * [Grunt](http://gruntjs.com/): Javascript task runner for automating repetitive mundane task.
  * [FontAwesome](http://fortawesome.github.io/Font-Awesome/): Scalable vector icon library


### Get Started

  * Change `AppName` in `composer.json`, `app/start/global.php` and the `AppName` directory in app folder to your application name.
  * Change `username` in `app/database/seeds/SentrySeeder.php` if you want.
  * Run `composer install` in `/app` root.
  * Run `php artisan key:generate`.
  * Run `npm install` in `/public` folder to install Grunt and its plugins.
  * Run `chmod -R 777 app/storage`.
  * Optionally, run `chmod -R 777 public/uploads` if you want to have an upload folder for user-generated-content.
  * No newline at end of file.
