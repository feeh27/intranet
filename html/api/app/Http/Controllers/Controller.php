<?php

namespace App\Http\Controllers;

use App\Domain\Auth\Module\Module;
use App\Domain\Auth\Module\ModuleRepository;
use App\Infrastructure\BaseServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller: Responsável por gerenciar as chamadas das Controllers
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
abstract class Controller extends BaseController
{
    /**
     * @since Version 0.1.0
     * @var BaseServices
     */
    protected $services;

    /**
     * @since Version 0.2.0
     * @var String
     */
    protected $module;

    /**
     * Controller constructor.
     * @since Version 0.1.0
     * @param BaseServices $services
     * @param String $module
     */
    public function __construct(BaseServices $services, string $module)
    {
        $this->services = $services;
        $this->module = $module;
        $this->rules = [];
        $this->messages = [];
        $this->customAttributes = [];
    }

    /**
     * Busca todos os registros
     * @since Version 0.1.0
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function get(): object
    {
        $this->authorize('get_'.$this->module);
        return response($this->services->findAll(),200);
    }

    /**
     * Busca um registro pelo ID
     * @since  Version 0.1.0
     * @param  int $id
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function getById(int $id): object
    {
        $this->authorize('get_'.$this->module);
        return response($this->services->findById($id),200);
    }

    /**
     * Cria um novo registro
     * @since Version 0.1.0
     * @param Request $request
     * @return object
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request): object
    {
        $this->authorize('create_'.$this->module);
        return response($this->services->create($request), 201);
    }

    /**
     * Altera o registro do id informado
     * @since  Version 0.1.0
     * @param  int $id
     * @param  Request $request
     * @return object
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(int $id, Request $request): object
    {
        $this->authorize('update_'.$this->module);
        return response($this->services->update($id, $request), 200);
    }

    /**
     * Deleta o registro com o id informado
     * @since  Version 0.1.0
     * @param  int $id
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(int $id): object
    {
        $this->authorize('delete_'.$this->module);
        return response($this->services->delete($id),200);
    }

    /**
     * Restaura o registro com o id informado
     * @since  Version 0.1.0
     * @param  int $id
     * @return object
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function restore(int $id): object
    {
        $this->authorize('restore_'.$this->module);
        return response($this->services->restore($id),200);
    }

    /* */
    public function permissions()
    {
        echo '<pre>';
        foreach ((new ModuleRepository(new Module()))->findAll() as $module) {
            echo str_pad($module->name, 13).' : ';
            var_dump(Auth::user()->hasPermission($module));
        }
        echo '</pre>';
        exit;
    }
    /* */

}
