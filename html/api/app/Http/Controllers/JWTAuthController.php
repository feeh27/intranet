<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;

/**
 * Class JWTAuthController: Classe do controle da autenticação JWT
 * @package     App\Http\Controllers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class JWTAuthController extends BaseController
{
    /**
     * @var Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    /**
     * JWTAuthController constructor.
     * @since Version 0.2.0
     * @param JWTAuth $jwt
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * Controla o Login via JWT
     * @since Version 0.2.0
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
            return response()->json(['user_not_found'], 404);
        }

        return response()->json(compact('token'));
    }

    /**
     * Logout JWT
     * @return array
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    public function logout()
    {
        Auth::logout();
        \Auth::logout(true);
        \Auth::invalidate();
        Auth::invalidate();
        $token = $this->jwt->getToken();
        $this->jwt->setToken($token)->invalidate(true);
        $this->jwt->invalidate();
        $this->jwt->invalidate(true);
        $this->jwt->invalidate($this->jwt->getToken());
        $this->jwt->invalidate($this->jwt->parseToken());
        $this->jwt->parseToken()->invalidate();

        return ['message'=>'token removed'] ;
    }
}
