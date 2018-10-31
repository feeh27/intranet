<?php

namespace App\Repositories\Contracts;

/**
 * Interface RepositoryInterface: responsável por fazer a interface do repositório padrão
 *
 * @package     App\Repositories\Contracts
 * @category    Api
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
interface RepositoryInterface
{
    /**
     * Busca todos os registros
     * @since Version 0.1.0
     * @return array
     */
    public function findAll();

    /**
     * Busca um registro pelo Id
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function findById($id);

    /**
     * Insere um novo registro
     * @since Version 0.1.0
     * @param array $data
     * @return array
     */
    public function create(array $data);

    /**
     * Altera um registro
     * @since Version 0.1.0
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data);

    /**
     * Faz um soft delete no registro
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function delete($id);

    /**
     * Restaura um registro no qual foi deletado por soft delete
     * @since Version 0.1.0
     * @param int $id
     * @return array
     */
    public function restore($id);
}