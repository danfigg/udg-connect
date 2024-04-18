<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Evento $evento): Response
    {
        return $user->id === $evento->user_id
            ? Response::allow()
            : Response::deny('No puedes editar un evento que no creaste');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Evento $evento): Response
    {
        return $user->id === $evento->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar un evento que no creaste');
    }

    /**
     * Determine whether the user can register to the model.
     */
    public function register(User $user, Evento $evento): Response
    {
        return $user->id !== $evento->user_id
            ? Response::allow()
            : Response::deny('No puedes registrarte a un evento que creaste');
    }
}
