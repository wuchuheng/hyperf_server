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

Router::get('/', function () {
    return 'index';
});
# 前端接口
Router::addGroup('/api', function () {
    Router::get('/login', function () {
        return 'login';
    });
    # 路由验证组
    Router::addGroup('', function () {
        Router::get('/data', function () {
            return 'data';
        });
    }, ['middleware' => [Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]]);
});

# 后端接口
Router::addGroup('/api/admin', function () {
    Router::post('/authorizations', [App\Http\Admin\Controller\AuthorizationsController::class, 'store']);
    # 权限接口
    Router::addGroup('', function () {
        Router::get('/users/me', [\App\Http\Admin\Controller\UsersController::class, 'showMe']);
        Router::get('/dashboards', [\App\Http\Admin\Controller\DashboardsController::class, 'index']);
        Router::get('/permissions', [\App\Http\Admin\Controller\PermissionesController::class, 'index']);
        Router::post('/permissions', [\App\Http\Admin\Controller\PermissionesController::class, 'store']);
        Router::get('/permissions/trees', [\App\Http\Admin\Controller\PermissionesController::class, 'treeIndex']);
    }, ['middleware' => [Phper666\JwtAuth\Middleware\JwtAuthMiddleware::class]]);
});
