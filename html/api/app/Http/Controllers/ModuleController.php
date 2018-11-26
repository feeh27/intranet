<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Module\ModuleServices;

/**
 * Class ModuleController: responsável por gerenciar as controllers dos módulos
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ModuleController extends Controller
{
    /**
     * ModuleController constructor.
     * @since Version 0.2.0
     * @param ModuleServices $services
     */
    public function __construct(ModuleServices $services)
    {
        parent::__construct($services, 'module');
    }
}
