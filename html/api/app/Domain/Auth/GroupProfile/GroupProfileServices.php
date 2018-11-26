<?php

namespace App\Domain\Auth\GroupProfile;

use App\Infrastructure\BaseServices;
use Illuminate\Http\Request;

/**
 * Class GroupProfileServices: responsável por gerenciar os serviços das relações entre grupo e perfil
 *
 * @package     App\Domain\Auth\GroupProfile
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupProfileServices extends BaseServices
{
    /**
     * GroupProfileServices constructor.
     * @since Version 0.2.0
     * @param GroupProfileRepository $repository
     */
    public function __construct(GroupProfileRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}