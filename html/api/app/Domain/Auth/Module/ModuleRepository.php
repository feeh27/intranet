<?php

namespace App\Domain\Auth\Module;

use App\Infrastructure\BaseRepository;

/**
 * Class ModuleRepository: responsável por gerenciar os repositories dos módulos
 *
 * @package     App\Domain\Auth\Module
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ModuleRepository extends BaseRepository
{

    /**
     * ModuleRepository constructor.
     * @since Version 0.2.0
     * @param Module $model
     */
    public function __construct(Module $model)
    {
        parent::__construct($model);
    }

}