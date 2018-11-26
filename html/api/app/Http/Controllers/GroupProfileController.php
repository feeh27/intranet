<?php

namespace App\Http\Controllers;

use App\Domain\Auth\GroupProfile\GroupProfileServices;

/**
 * Class GroupProfileController: responsável por gerenciar as controllers das permissões
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupProfileController extends Controller
{
    /**
     * GroupProfileController constructor.
     * @since Version 0.2.0
     * @param GroupProfileServices $services
     */
    public function __construct(GroupProfileServices $services)
    {
        parent::__construct($services, 'permission');
    }
}
