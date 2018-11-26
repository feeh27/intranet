<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class BaseTesting: Responsável pelos testes das rotas das models
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class BaseTesting extends TestCase
{
    protected $jsonStructureLumen;
    protected $uri;
    protected $token;
    protected $jsonStructure;
    protected $postData;
    protected $hiddenData;
    protected $putData;
    protected $patchData;
    protected $nextId;
    protected $model;
    protected $errorData;

    /**
     * BaseTesting constructor.
     * @param BaseModel $model
     * @since Version 0.1.0
     */
    public function __construct(BaseModel $model)
    {
        parent::__construct(null, [], '');

        $this->jsonStructureLumen = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $this->uri = $model->uri;
        $this->jsonStructure = $model->getFillable();
        foreach (array_keys($this->hiddenData) as $array_key) {
            $key = array_search($array_key, $this->jsonStructure);
            if($key) unset($this->jsonStructure[$key]);
        }
        $this->jsonStructure = array_values($this->jsonStructure);
    }

    /**
     * Gera token de acesso de acordo com as credenciais passadas
     * @since Version 0.2.0
     */
    public function getToken()
    {
        $tokenAuth   = ['email'=>'token@gmail.com', 'password'=>'123456'];
        $tokenPost   = json_decode($this->post('auth/login',$tokenAuth)->response->getContent());
        $this->token = $tokenPost->token;
        $this->post('auth/login',$tokenAuth)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' => ['token']]);
    }

    /**
     * Responsável pelos testes da rota get
     * @since Version 0.1.0
     */
    public function testGet()
    {
        $this->getToken();
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
        $this->getToken();
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
        $this->getToken();
        $jsonStructure = array_merge(array_keys($this->postData), $this->jsonStructureLumen);
        $key = array_search('deleted_at', $jsonStructure);
        unset($jsonStructure[$key]);

        $this->postData = array_merge($this->postData, $this->hiddenData);

        $this->post($this->uri . '/?token=' . $this->token, $this->postData)
            ->seeStatusCode(201)
            ->seeJsonStructure(['*' => $jsonStructure]);

    }

    /**
     * Responsável pelos testes da rota put
     * @since Version 0.1.0
     */
    public function testPut()
    {
        $this->getToken();
        $this->put($this->uri.'/'.$this->nextId.'?token='.$this->token, $this->putData)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' =>['message']])
            ->seeJsonEquals(['message' => __('update_success')]);
    }

    /**
     * Responsável pelos testes da rota patch
     * @since Version 0.1.0
     */
    public function testPatch()
    {
        $this->getToken();
        $this->patch($this->uri.'/'.$this->nextId.'?token='.$this->token, $this->patchData)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' =>['message']])
            ->seeJsonEquals(['message' => __('update_success')]);
    }

    /**
     * Responsável pelos testes da rota delete
     * @since Version 0.1.0
     */
    public function testDelete()
    {
        $this->getToken();
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
        $this->getToken();
        $this->patch($this->uri.'/restore/'.$this->nextId.'?token='.$this->token)
            ->seeStatusCode(200)
            ->seeJsonStructure(['*' =>['message']])
            ->seeJsonEquals(['message' => __('restore_success')]);
    }

    /**
     * Responsável pelos testes de handling de erros
     * @since Version 0.2.0
     */
    public function testErrorsHandling()
    {
        $this->getToken();
        foreach ($this->errorData as $field) {
            $this->patch($this->uri . '/' . $this->nextId . '?token=' . $this->token, $field)
                ->seeStatusCode(422)
                ->seeJsonStructure(['*'=>[array_keys($field)]]);
        }
    }
}