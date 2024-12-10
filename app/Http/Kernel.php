protected $routeMiddleware = [
  
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class
    'setlocale' => \App\Http\Middleware\SetLocale::class
];



