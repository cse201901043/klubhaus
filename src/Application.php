<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
{
    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue)
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(ErrorHandlerMiddleware::class)

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(AssetMiddleware::class)

            // Add routing middleware.
            ->add(new RoutingMiddleware($this));

            // add SocialAuthMiddleware
            $middlewareQueue->add(new \ADmad\SocialAuth\Middleware\SocialAuthMiddleware([
                // Request method type use to initiate authentication.
                'requestMethod' => 'POST',
                // Login page URL. In case of auth failure user is redirected to login
                // page with "error" query string var.
                'loginUrl' => '/',
                // URL to redirect to after authentication (string or array).
                // 'loginRedirect' => '/my-account',
                // Boolean indicating whether user identity should be returned as entity.
                'userEntity' => false,
                // User model.
                'userModel' => 'Users',
                // Finder type.
                'finder' => 'all',
                // Fields.
                'fields' => [
                    'password' => 'password',
                ],
                // Session key to which to write identity record to.
                'sessionKey' => 'Auth.User',
                // The method in user model which should be called in case of new user.
                // It should return a User entity.
                'getUserCallback' => 'getUser',
                // SocialConnect Auth service's providers config. https://github.com/SocialConnect/auth/blob/master/README.md
                'serviceConfig' => [
                    'provider' => [
                        'facebook' => [
                            'applicationId' => '348347955678894',
                            'applicationSecret' => '18b5a7a1e15c555ba08c65708cdb5cca',
                            'scope' => [
                                'email',
                            ],
                            'fields' => [
                                'email', 'name', 'picture',
                                // To get a full list of all posible values, refer to
                                // https://developers.facebook.com/docs/graph-api/reference/user
                            ],
                        ],
                        'google' => [
                            'applicationId' => '300808893495-ih70p2ujh612gq1bdj4m2aec9o8nmjp0.apps.googleusercontent.com',
                            'applicationSecret' => 'Z6dluvxP1ZS6Xcni7cikR6hE',
                            'scope' => [
                                'https://www.googleapis.com/auth/userinfo.email',
                                'https://www.googleapis.com/auth/userinfo.profile',
                            ],
                        ],
                    ],
                ],
                // Whether social connect errors should be logged. Default `true`.
                'logErrors' => true,
            ]));

        return $middlewareQueue;
    }
}
