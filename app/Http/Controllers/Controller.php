<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Alias the base controller

/**
 * Class Controller
 * @package App\Http\Controllers
 *
 * This is the base controller for your application.
 * All other controllers should extend this class.
 *
 * It extends Laravel's `BaseController` which provides core functionalities
 * like middleware handling, view rendering, and redirection.
 * It also uses `AuthorizesRequests` and `ValidatesRequests` traits
 * for authorization and validation features.
 */
abstract class Controller extends BaseController
{
    // These traits provide common functionalities for controllers.
    // AuthorizesRequests: For checking user permissions.
    use AuthorizesRequests;
    // ValidatesRequests: For validating incoming HTTP requests.
    use ValidatesRequests;

    // You can add common methods or properties here that all your
    // application's controllers should have.
}
