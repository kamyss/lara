<?php 
	
	$app['router']->get('/',function(){
		return '<h1>路由成功！！</h1>';
	});
	$app['router']->get('welcome','App\Http\Controllers\WelcomeController@index');
	$app['router']->get('student','App\Http\Controllers\WelcomeController@student');
	$app['router']->get('studentView','App\Http\Controllers\WelcomeController@studentView');

?>