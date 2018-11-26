<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Group\GroupServices;

/**
 * Class GroupController: responsável por gerenciar as controllers dos grupos
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupController extends Controller
{
    /**
     * GroupController constructor.
     * @since Version 0.2.0
     * @param GroupServices $services
     */
    public function __construct(GroupServices $services)
    {
        parent::__construct($services, 'group');
    }
}
