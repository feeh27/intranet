<?php

namespace App\Domain\Auth\Method;

use App\Infrastructure\BaseServices;
use Illuminate\Http\Request;

/**
 * Class MethodServices: responsável por gerenciar os serviços dos métodos
 *
 * @package     App\Domain\Auth\Method
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class MethodServices extends BaseServices
{
    /**
     * GroupProfileServices constructor.
     * @since Version 0.2.0
     * @param MethodRepository $repository
     */
    public function __construct(MethodRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}