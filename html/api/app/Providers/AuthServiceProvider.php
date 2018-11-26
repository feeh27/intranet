<?php

namespace App\Providers;

use App\Domain\Auth\User\User;
use App\Domain\Auth\Module\Module;
use App\Domain\Auth\Profile\Profile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * Class AuthServiceProvider: Provider de autenticação JWT
 * @package     App\Providers
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @since Version 0.1.0
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     * Verifica se o usuário é admin ou se o perfil dele está habilitado para realizar a ação solicitada
     *
     * @since Version 0.1.0
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('token')) {
                return User::where('api_token', $request->input('token'))->first();
            }
        });

        if (Schema::hasTable('modules') and Schema::hasTable('profiles')) {

            //
            $modules = Module::with('groups')->get();
            foreach ($modules as $module) {
                Gate::define($module->name, function (User $user) use ($module){
                    return $user->hasPermission($module);
                });
            }

            //verifica se o usuário é admin para liberar acesso total
            $profiles = Profile::where('name',(new Profile())->admin_profile_name)->orWhere('name','test')->get();
            foreach ($profiles as $profile) {
                Gate::before(function (User $user) use ($profile) {
                    if( $user->hasProfile($profile) ) return true;
                });
            }
        }

    }
}
