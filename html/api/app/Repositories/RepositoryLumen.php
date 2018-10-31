<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class RepositoryLumen: responsável por gerenciar as funções padrões dos repósitorios de todos os modelos
 *
 * @package     App\Repositories
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */

class RepositoryLumen implements RepositoryInterface
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
     * @return RepositoryLumen
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Busca todos os registros
     * @since Version 0.1.0
     * @return array
     */
    public function findAll()
    {
        return $this->model->all()->toArray();
    }

    /**
     * Busca todos os registros de acordo com as condições passadas por array
     * @since Version 0.1.0
     * @param array $conditions
     * @return array
     */
    public function findAllWhere(array $conditions)
    {
        return $this->model->where($conditions)->get()->toArray();
    }

    /**
     * Busca um registro pelo Id
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id)->toArray();
    }

    /**
     * Eager load de relacionamento do banco de dados
     * @since Version 0.1.0
     * @param type $relations
     * @return Model
     */
    public function with($relations)
    {
        return response()->json($this->model->with($relations),200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Insere um novo registro
     * @since Version 0.1.0
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        return $this->model->create($data)->toArray();
    }

    /**
     * Altera um registro
     * @since Version 0.1.0
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data)
    {
        $record = $this->model->findOrFail($id);
        $update = $record->update($data);
        return $update ? $record : ["message"=>__('update_error')];
    }

    /**
     * Faz um soft delete no registro
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
        return ["message"=> ($model->trashed() ? __('delete_success') : __('delete_error'))];
    }

    /**
     * Restaura um registro no qual foi deletado por soft delete
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function restore($id)
    {
        $model = $this->model->withTrashed()->findOrFail($id)->restore();
        return ["message"=> ($model ? __('restore_success') : __('restore_error'))];
    }
}