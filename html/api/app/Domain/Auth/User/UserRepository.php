<?php

namespace App\Domain\Auth\User;

use App\Infrastructure\BaseRepository;

/**
 * Class UserRepository: responsável por gerenciar os repositories dos usuários
 *
 * @package     App\Domain\Auth\User
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class UserRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     * @since Version 0.2.0
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Busca pelo nome
     * @since Version 0.2.0
     * @param User $model
     * @return object
     */
    public function findByName(User $model)
    {
        return $this->findAllWhere(['name' => $model->name]);
    }

    /**
     * Busca pelo e-mail
     * @since Version 0.2.0
     * @param User $model
     * @return object
     */
    public function findByEmail(User $model)
    {
        return $this->findAllWhere(['email' => $model->email]);
    }

    /**
     * Busca pelo login
     * @since Version 0.2.0
     * @param User $model
     * @return object
     */
    public function findByLogin(User $model)
    {
        return $this->findAllWhere(['login' => $model->login]);
    }
}