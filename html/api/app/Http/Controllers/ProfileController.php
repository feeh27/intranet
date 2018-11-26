<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Profile\ProfileServices;

/**
 * Class ProfileController: responsável por gerenciar as controllers dos perfis
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     * @since Version 0.2.0
     * @param ProfileServices $services
     */
    public function __construct(ProfileServices $services)
    {
        parent::__construct($services, 'profile');
    }
}
