<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class BaseTesting: Responsável pelos testes das rotas das models
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class BaseTesting extends TestCase
{
    protected $jsonStructureLumen;
    protected $jsonReturnLumen;
    protected $uri;
    protected $token;
    protected $jsonStructure;
    protected $postData;
    protected $hiddenData;
    protected $putData;
    protected $patchData;
    protected $nextId;

    /**
     * BaseTesting constructor.
     * @param BaseModel $model
     * @since Version 0.1.0
     */
    public function __construct(BaseModel $model)
    {
        parent::__construct(null, [], '');
        $this->jsonStructureLumen = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $this->jsonReturnLumen    = ['id' => $this->nextId, 'deleted_at' => null];
        $this->uri = $model->uri;
        $this->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOjEsImlhdCI6MTU0MDk0MzU1MiwiZXhwIjoxNTQwOTQ3MTUyfQ.jC8gpDfnBMjQCg2l2Weg1yM0yX8tKvxc2cgDhLrVIBE';
        $this->jsonStructure = $model->getFillable();
        foreach (array_keys($this->hiddenData) as $array_key) {
            $key = array_search($array_key, $this->jsonStructure);
            if($key) unset($this->jsonStructure[$key]);
        }
        $this->jsonStructure = array_values($this->jsonStructure);
    }

    /**
     * Responsável pelos testes da rota get
     * @since Version 0.1.0
     */
    public function testGet()
    {
        $jsonStructure = array_merge($this->jsonStructureLumen, $this->jsonStructure);

        $this->get($this->uri.'/?token='.$this->token)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' => $jsonStructure]);
    }

    /**
     * Responsável pelos testes da rota get by id
     * @since Version 0.1.0
     */
    public function testGetById()
    {
        $jsonStructure = array_merge($this->jsonStructureLumen, $this->jsonStructure);
        $this->get($this->uri.'/1?token='.$this->token)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' => $jsonStructure]);
    }

    /**
     * Responsável pelos testes da rota post
     * @since Version 0.1.0
     */
    public function testPost()
    {
        $jsonStructure  = array_merge(array_keys($this->postData), $this->jsonStructureLumen);
        $key = array_search('deleted_at', $jsonStructure);
        unset($jsonStructure[$key]);

        $this->postData = array_merge($this->postData, $this->hiddenData);
        $this->post($this->uri.'/?token='.$this->token, $this->postData)
            ->seeStatusCode(201)
            ->seeJsonStructure(['*' => $jsonStructure]);
    }

    /**
     * Responsável pelos testes da rota put
     * @since Version 0.1.0
     */
    public function testPut()
    {
        $jsonStructure = array_merge($this->jsonStructureLumen, $this->jsonStructure);
        $this->jsonReturnLumen = array_merge($this->jsonReturnLumen, $this->putData);

        $this->put($this->uri.'/'.$this->nextId.'?token='.$this->token, $this->putData)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' => $jsonStructure])
            ->seeJson($this->jsonReturnLumen);
    }

    /**
     * Responsável pelos testes da rota patch
     * @since Version 0.1.0
     */
    public function testPatch()
    {
        $jsonStructure = array_merge($this->jsonStructureLumen, $this->jsonStructure);
        $this->jsonReturnLumen = array_merge($this->jsonReturnLumen, $this->patchData);

        $this->patch($this->uri.'/'.$this->nextId.'?token='.$this->token, $this->patchData)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' => $jsonStructure])
            ->seeJson($this->jsonReturnLumen);
    }

    /**
     * Responsável pelos testes da rota delete
     * @since Version 0.1.0
     */
    public function testDelete()
    {
        $this->delete($this->uri.'/'.$this->nextId.'?token='.$this->token)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' =>['message']])
            ->seeJsonEquals(['message' => __('delete_success')]);
    }

    /**
     * Responsável pelos testes da rota restore
     * @since Version 0.1.0
     */
    public function testRestore()
    {
        $this->patch($this->uri.'/restore/'.$this->nextId.'?token='.$this->token)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' =>['message']])
            ->seeJsonEquals(['message' => __('restore_success')]);
    }
}