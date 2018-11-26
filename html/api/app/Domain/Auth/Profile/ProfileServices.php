<?php

namespace App\Domain\Auth\Profile;

use App\Infrastructure\BaseServices;
use Illuminate\Http\Request;

/**
 * Class ProfileServices: responsável por gerenciar os serviços dos perfis
 *
 * @package     App\Domain\Auth\Profile
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ProfileServices extends BaseServices
{
    /**
     * ProfileServices constructor.
     * @since Version 0.2.0
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
    {
        parent::__construct($repository);

        $this->rulesCreate = ValueObjects\Validation::getRulesCreate();
        $this->rulesUpdate = ValueObjects\Validation::getRulesUpdate();
        $this->messages    = ValueObjects\Validation::getMessages();
    }
}