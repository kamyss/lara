<?php
    use Illuminate\Database\Capsule\Manager;
    use Illuminate\Support\fluent;
    require __DIR__.'/../vendor/autoload.php';
    $app=new Illuminate\Container\Container;
    Illuminate\Container\Container::setInstance($app);
    with(new Illuminate\Events\EventServiceProvider($app))->register();
    with(new Illuminate\Routing\RoutingServiceProvider($app))->register();
    //启动Eloquent ORM进行相关配置
    $manager=new Manager();
    $manager->addConnection(require '../config/database.php');
    $manager->bootEloquent();
    $app->instance('config',new fluent);
    $app['config']['view.compiled']=__DIR__.'/../storage/framework/views';
    $app['config']['view.paths']=['../resources/views'];
    with(new Illuminate\View\ViewServiceProvider($app))->register();
    with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();
    require __DIR__.'/../app/Http/routes.php';
    $requests=Illuminate\Http\Request::createFromGlobals();
    $response=$app['router']->dispatch($requests);
    $response->send();

?>