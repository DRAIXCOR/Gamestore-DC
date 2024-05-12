<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Juegos;
use App\Models\User;
use App\Policies\JuegoPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //policie del controlador juego
        Juegos::class => JuegoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verificación de Correo Electrónico')
                ->greeting('Hola, ' . $notifiable->name)
                ->line('Presiona el botón para verificar esta dirección de correo electrónico :)')
                ->action('Verificar', $url)
                ->salutation('Saludos, GamestoreDC');
        });

         Gate::define('edit-juego', function (User $user, Juegos $juego): Response {
            //Verifica si el juego tiene el id actual y lo permite editar 
            return $user->id === $juego->user_id
                ? Response::allow()
                : Response::deny();
            });

      
    }
 
}
