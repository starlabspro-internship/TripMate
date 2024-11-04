protected $routeMiddleware = [
    // ...
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'super_admin' => \App\Http\Middleware\SuperAdminMiddleware::class
];



