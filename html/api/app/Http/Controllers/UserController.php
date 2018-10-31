<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class UserController: responsável por gerenciar as controllers dos usuários
 *
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     * @since Version 0.1.0
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
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
        $this->rules = [
            'name'       => 'required|alpha',
            'lastname'   => 'required|regex:/^[a-zA-Z\- ]+$/',
            'email'      => 'required|email|unique:users',
            'login'      => 'required|alpha_num|unique:users',
            'password'   => 'required|alpha_num',
            'profile_id' => 'integer',
            'active'     => ['regex:/^[0|1]$/'],
        ];

        $this->messages = [
            'lastname.regex' => __('lastname_regex'),
            'active.regex'   => __('active_regex'),
        ];

        $this->validate($request, $this->rules, $this->messages, $this->customAttributes);

        return response($this->repository->create($request->all()),201);
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
        $this->rules = [
            'name'       => 'alpha',
            'lastname'   => 'regex:/^[a-zA-Z\- ]+$/',
            'email'      => 'email|unique:users',
            'login'      => 'alpha_num|unique:users',
            'password'   => 'alpha_num',
            'profile_id' => 'integer',
            'active'     => ['regex:/^[0|1]$/'],
        ];

        $this->messages = [
            'lastname.regex' => __('lastname_regex'),
            'active.regex'   => __('active_regex'),
        ];

        $this->validate($request, $this->rules, $this->messages, $this->customAttributes);

        return response($this->repository->update($id, $request->all()), 200);
    }
}
