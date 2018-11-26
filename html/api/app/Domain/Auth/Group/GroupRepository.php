<?php

namespace App\Domain\Auth\Group;

use App\Infrastructure\BaseRepository;

/**
 * Class GroupRepository: responsável por gerenciar os repositories dos grupos
 *
 * @package     App\Domain\Auth\Group
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupRepository extends BaseRepository
{

    /**
     * GroupRepository constructor.
     * @since Version 0.2.0
     * @param Group $model
     */
    public function __construct(Group $model)
    {
        parent::__construct($model);
    }

}