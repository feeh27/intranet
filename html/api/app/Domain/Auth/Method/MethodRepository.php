<?php

namespace App\Domain\Auth\Method;

use App\Infrastructure\BaseRepository;

/**
 * Class MethodRepository: responsável por gerenciar os repositories dos métodos
 *
 * @package     App\Domain\Auth\Method
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class MethodRepository extends BaseRepository
{

    /**
     * MethodRepository constructor.
     * @since Version 0.2.0
     * @param Method $model
     */
    public function __construct(Method $model)
    {
        parent::__construct($model);
    }

}