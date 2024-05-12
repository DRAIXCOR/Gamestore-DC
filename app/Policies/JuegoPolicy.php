<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Juegos;
use Illuminate\Auth\Access\Response;

class JuegoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Juegos $juego): Response
    {
         //Verifica si el juego tiene su id y lo permite eliminar
         return $user->id === $juego->user_id
         ? Response::allow()
         : Response::deny('No puedes eliminar juegos que no son tuyos');
    }

}
