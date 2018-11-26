<?php

namespace App\Infrastructure;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

/**
 * Class BaseService: Classe base dos serviços do sistema
 *
 * @package     App\Infrastructure
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
abstract class BaseServices
{
    use ProvidesConvenienceMethods; //para utilizar a validação

    /**
     * @since Version 0.2.0
     * @var BaseRepository
     */
    protected $repository;

    /**
     * @since Version 0.2.0
     * @var array
     */
    protected $rulesCreate;

    /**
     * @since Version 0.2.0
     * @var array
     */
    protected $rulesUpdate;

    /**
     * @since Version 0.2.0
     * @var array
     */
    protected $messages;

    /**
     * @since Version 0.2.0
     * @var array
     */
    protected $customAttributes;

    /**
     * BaseService constructor.
     * @since Version 0.2.0
     * @param BaseRepository $repository
     */
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
        $this->rules = [];
        $this->messages = [];
        $this->customAttributes = [];
    }

    /**
     * Busca todos os registros
     * @since Version 0.2.0
     * @return object
     */
    public function findAll(): object
    {
        return $this->repository->findAll();
    }

    /**
     * Busca um registro pelo ID
     * @since Version 0.2.0
     * @param $id
     * @return object
     */
    public function findById($id): object
    {
        return $this->repository->findById($id);
    }

    /**
     * Cria um novo registro
     * @since Version 0.2.0
     * @param Request $request
     * @return object
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request): object
    {
        $this->validate($request, $this->rulesCreate, $this->messages, $this->customAttributes);
        return $this->repository->create($request->all());
    }

    /**
     * Altera o registro do id informado
     * @since Version 0.2.0
     * @param $id
     * @param Request $request
     * @return object
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request): object
    {
        $this->validate($request, $this->rulesUpdate, $this->messages, $this->customAttributes);
        return $this->repository->update($id, $request->all());
    }

    /**
     * Deleta o registro com o id informado
     * @since Version 0.2.0
     * @param $id
     * @return object
     */
    public function delete($id): object
    {
        return $this->repository->delete($id);
    }

    /**
     * Restaura o registro com o id informado
     * @since Version 0.2.0
     * @param $id
     * @return array
     */
    public function restore($id): object
    {
        return $this->repository->restore($id);
    }
}
