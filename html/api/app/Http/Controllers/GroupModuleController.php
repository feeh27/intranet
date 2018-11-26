<?php

namespace App\Http\Controllers;

use App\Domain\Auth\GroupModule\GroupModuleServices;

/**
 * Class GroupController: responsável por gerenciar as controllers das relações entre grupos e módulos
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupModuleController extends Controller
{
    /**
     * GroupController constructor.
     * @since Version 0.2.0
     * @param GroupModuleServices $services
     */
    public function __construct(GroupModuleServices $services)
    {
        parent::__construct($services, 'group_module');
    }
}
