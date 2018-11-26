<?php

namespace App\Domain\Auth\Module;

use App\Infrastructure\BaseServices;
use Illuminate\Http\Request;

/**
 * Class ModuleServices: responsável por gerenciar os serviços dos módulos
 *
 * @package     App\Domain\Auth\Module
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ModuleServices extends BaseServices
{
    /**
     * ModuleServices constructor.
     * @since Version 0.2.0
     * @param ModuleRepository $repository
     */
    public function __construct(ModuleRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}