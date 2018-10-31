<?php

namespace App\Http\Controllers;

use App\Repositories\RepositoryLumen;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * Class Controller: Responsável por gerenciar as chamadas das Controllers
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class Controller extends BaseController
{
    /**
     * @since Version 0.1.0
     * @var RepositoryLumen
     */
    protected $repository;

    /**
     * @since Version 0.1.0
     * @var array
     */
    protected $rules;

    /**
     * @since Version 0.1.0
     * @var array
     */
    protected $messages;

    /**
     * @since Version 0.1.0
     * @var array
     */
    protected $customAttributes;

    /**
     * Controller constructor.
     * @since Version 0.1.0
     * @param RepositoryLumen $repository
     */
    public function __construct(RepositoryLumen $repository)
    {
        $this->repository = $repository;
        $this->rules = [];
        $this->messages = [];
        $this->customAttributes = [];
    }

    /**
     * Busca todos os registros
     * @since Version 0.1.0
     * @return array
     */
    public function get() : object
    {
        return response($this->repository->findAll(),200);
    }

    /**
     * Busca um registro pelo ID
     * @since Version 0.1.0
     * @param $id
     * @return array
     */
    public function getById($id) : object
    {
        return response($this->repository->findById($id),200);
    }

    /**
     * Cria um novo registro
     * @since Version 0.1.0
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request) : object
    {
        $this->validate($request, $this->rules, $this->messages, $this->customAttributes);
        return response($this->repository->create($request->all()), 201);
    }

    /**
     * Altera o registro com o id informado
     * @since Version 0.1.0
     * @param $id
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request) : object
    {
        $this->validate($request, $this->rules, $this->messages, $this->customAttributes);
        return response($this->repository->update($id, $request->all()), 201);
    }

    /**
     * Deleta o registro com o id informado
     * @since Version 0.1.0
     * @param $id
     * @return array
     */
    public function delete($id) : object
    {
        return response($this->repository->delete($id),200);
    }

    /**
     * Restaura o registro com o id informado
     * @since Version 0.1.0
     * @param $id
     * @return array
     */
    public function restore($id) : object
    {
        return response($this->repository->restore($id),200);
    }
}
