<?php

  $app['router']->get('/', function() {
      return 'Are you looking for me ?';
  });

  $app['router']->get('/test', 'TestController@hello');
  $app['router']->get('/tour', 'ToursController@index');
?>
