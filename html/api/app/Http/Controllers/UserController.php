<?php

namespace App\Http\Controllers;

use App\Domain\Auth\User\UserServices;

/**
 * Class UserController: responsável por gerenciar as controllers dos usuários
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     * @since Version 0.1.0
     * @param UserServices $services
     */
    public function __construct(UserServices $services)
    {
        parent::__construct($services, 'user');
    }
}
