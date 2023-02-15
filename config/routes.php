<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

use App\Controller\UserController;
use App\Controller\TransactionController;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});

/**
 * User routes
 */
Router::addGroup('/users', function () {
    Router::get('', [UserController::class, 'index']);
    Router::get('/{id}', [UserController::class, 'show']);
    Router::post('', [UserController::class, 'store']);
    Router::delete('/{id}', [UserController::class, 'delete']);
});

/**
 * Transaction routes
 */
Router::post('', [TransactionController::class, 'transact']);