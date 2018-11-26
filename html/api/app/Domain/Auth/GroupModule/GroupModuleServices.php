<?php

namespace App\Domain\Auth\GroupModule;

use App\Infrastructure\BaseServices;

/**
 * Class GroupModuleServices: responsável por gerenciar os serviços da relação entre grupos e módulos
 *
 * @package     App\Domain\Auth\GroupModule
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupModuleServices extends BaseServices
{
    /**
     * GroupModuleServices constructor.
     * @since Version 0.2.0
     * @param GroupModuleRepository $repository
     */
    public function __construct(GroupModuleRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}
