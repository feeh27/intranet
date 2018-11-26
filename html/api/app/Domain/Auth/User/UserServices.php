<?php

namespace App\Domain\Auth\User;

use App\Infrastructure\BaseServices;

/**
 * Class UserServices: responsável por gerenciar os serviços dos usuários
 *
 * @package     App\Domain\Auth\User
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class UserServices extends BaseServices
{
    /**
     * UserServices constructor.
     * @since Version 0.1.0
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}
