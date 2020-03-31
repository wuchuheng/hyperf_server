<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::get('/', function (){
    return 'index';
});
# 前端接口
Router::addGroup('/api', function () {
    Router::get('/login',function () {
        return 'login';
    });
    # 路由验证组
    Router::addGroup('', function (){
        Router::get('/data', function (){
            return 'data';
        });
    }, ['middleware' => [Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]]);

});

# 后端接口
Router::addGroup('/admin', function() {
    Router::post('/authorizations', [App\Http\Admin\Controller\AuthorizationsController::class, 'store']);
});
