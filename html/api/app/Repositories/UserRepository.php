<?php

namespace App\Repositories;

use App\User;

/**
 * Class UserRepository
 * @package App\Repositories: responsável por gerenciar os repositories dos usuários
 * @category    API
 */
class UserRepository extends RepositoryLumen
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByName(User $model)
    {
        return $this->findAllWhere(["name" => $model->name]);
    }

    public function findByEmail(User $model)
    {
        return $this->findAllWhere(["email" => $model->email]);
    }

    public function findByLogin(User $model)
    {
        return $this->findAllWhere(["login" => $model->login]);
    }
}