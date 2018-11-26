<?php

namespace App\Domain\Auth\Group;

use App\Infrastructure\BaseServices;

/**
 * Class GroupServices: responsável por gerenciar os serviços dos grupos
 *
 * @package     App\Domain\Auth\Group
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupServices extends BaseServices
{
    /**
     * GroupServices constructor.
     * @since Version 0.2.0
     * @param GroupRepository $repository
     */
    public function __construct(GroupRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}
