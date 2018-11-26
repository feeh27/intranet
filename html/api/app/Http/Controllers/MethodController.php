<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Method\MethodServices;

/**
 * Class MethodController: responsável por gerenciar as controllers dos métodos
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class MethodController extends Controller
{
    /**
     * MethodController constructor.
     * @since Version 0.2.0
     * @param MethodServices $services
     */
    public function __construct(MethodServices $services)
    {
        parent::__construct($services, 'method');
    }
}
