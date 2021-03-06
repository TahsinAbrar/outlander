<?php

  use Illuminate\Database\Capsule\Manager as Capsule;

  $capsule = new Capsule;

  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'tour',
      'username'  => 'root',
      'password'  => 'abrar',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
  ]);

  // Make this Capsule instance available globally via static methods
  $capsule->setAsGlobal();

  // Setup the Eloquent ORM
  $capsule->bootEloquent();
?>
