<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AppInstallCommand extends Command {

  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'app:install';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Run application installation.';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return void
   */
  public function fire()
  {
    echo 'Installing...'.PHP_EOL;

    // Install Sentry
    $this->call('migrate', array('--package' => 'cartalyst/sentry'));

    // App migrations
    $this->call('migrate');

    $this->call('db:seed');

    // Publish config
    // $this->call('config:publish', array('package' => 'cartalyst/sentry'));

    // $this->call('config:publish', array('package' => 'barryvdh/laravel-debugbar'));

    echo 'Done.'.PHP_EOL;
  }

  /**
   * Get the console command arguments.
   *
   * @return array
   */
  protected function getArguments()
  {
    return array();
  }

  /**
   * Get the console command options.
   *
   * @return array
   */
  protected function getOptions()
  {
    return array();
  }

}