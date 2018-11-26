<?php

namespace App\Domain\Auth\GroupModule;

use App\Infrastructure\BaseRepository;

/**
 * Class GroupModuleRepository: responsável por gerenciar os repositories das relações entre grupos e módulos
 *
 * @package     App\Domain\Auth\GroupModule
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupModuleRepository extends BaseRepository
{

    /**
     * GroupModuleRepository constructor.
     * @since Version 0.2.0
     * @param GroupModule $model
     */
    public function __construct(GroupModule $model)
    {
        parent::__construct($model);
    }

}