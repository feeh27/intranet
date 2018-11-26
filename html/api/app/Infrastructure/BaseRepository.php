<?php

namespace App\Infrastructure;

use App\Infrastructure\Msg\Msg;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RepositoryLumen: responsável por gerenciar as funções padrões dos repósitorios de todos os modelos
 *
 * @package     App\Repositories
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */

abstract class BaseRepository
{
    /**
     * @since Version 0.1.0
     * @var Model
     */
    protected $model;

    /**
     * Método construtor
     * @since Version 0.1.0
     * @param Model $model
     * @return Model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Método getter para variável model
     * @since Version 0.1.0
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Método setter para variável model
     * @since Version 0.1.0
     * @param $model
     * @return BaseRepository
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Busca todos os registros
     * @since Version 0.1.0
     * @return object
     */
    public function findAll(): object
    {
        return $this->model->all();
    }

    /**
     * Busca todos os registros de acordo com as condições passadas por array
     * @since Version 0.1.0
     * @param array $conditions
     * @return object
     */
    public function findAllWhere(array $conditions): object
    {
        return $this->model->where($conditions)->get();
    }

    /**
     * Busca um registro pelo Id
     * @since Version 0.1.0
     * @param int $id
     * @return object
     */
    public function findById($id): object
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Insere um novo registro
     * @since Version 0.1.0
     * @param array $data
     * @return object
     */
    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    /**
     * Altera um registro
     * @since Version 0.1.0
     * @param int $id
     * @param array $data
     * @return object
     */
    public function update(int $id, array $data): object
    {
        $update = $this->model->findOrFail($id)->update($data);
        return new Msg($update ? __('update_success') : __('update_error')); //object return
        //return $update ? $record->toArray() : ['message'=>__('update_error')]; //array return
    }

    /**
     * Faz um soft delete no registro
     * @since Version 0.1.0
     * @param int $id
     * @return object
     */
    public function delete($id): object
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return new Msg($model->trashed() ? __('delete_success') : __('delete_error')); //object return
        //return ['message'=> ($model->trashed() ? __('delete_success') : __('delete_error'))]; //array return
    }

    /**
     * Restaura um registro no qual foi deletado por soft delete
     * @since Version 0.1.0
     * @param int $id
     * @return object
     */
    public function restore($id): object
    {
        return new Msg($this->model->withTrashed()->findOrFail($id)->restore() ? __('restore_success') : __('restore_error')); //object return
        //return ['message'=> ($this->model->withTrashed()->findOrFail($id)->restore() ? __('restore_success') : __('restore_error'))]; //array return
    }
}