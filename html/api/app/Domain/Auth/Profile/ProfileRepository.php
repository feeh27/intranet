<?php

namespace App\Domain\Auth\Profile;

use App\Infrastructure\BaseRepository;

/**
 * Class ProfileRepository: responsável por gerenciar os repositories dos perfis
 *
 * @package     App\Domain\Auth\Profile
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ProfileRepository extends BaseRepository
{

    /**
     * ProfileRepository constructor.
     * @since Version 0.2.0
     * @param Profile $model
     */
    public function __construct(Profile $model)
    {
        parent::__construct($model);
    }

}