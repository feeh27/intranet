<?php

namespace App\Domain\Auth\GroupProfile;

use App\Infrastructure\BaseRepository;

/**
 * Class GroupProfileRepository: responsável por gerenciar os repositories das relações entre grupos e perfis
 *
 * @package     App\Domain\Auth\GroupProfile
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupProfileRepository extends BaseRepository
{

    /**
     * GroupProfileRepository constructor.
     * @since Version 0.2.0
     * @param GroupProfile $model
     */
    public function __construct(GroupProfile $model)
    {
        parent::__construct($model);
    }

}