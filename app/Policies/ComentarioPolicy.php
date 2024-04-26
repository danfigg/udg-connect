<?php

namespace App\Policies;

use App\Models\Comentario;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComentarioPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comentario $comentario): Response
    {
        return $user->id == $comentario->user_id ? 
        Response::allow() :
        Response::deny('No puedes editar un comentario que no te pertenece');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comentario $comentario): Response
    {
        return $user->id == $comentario->user_id ? 
        Response::allow() :
        Response::deny('No puedes eliminar un comentario que no te pertenece');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comentario $comentario): Response
    {
        return $user->id == $comentario->user_id ? 
        Response::allow() :
        Response::deny('No puedes restablecer un comentario que no te pertenece');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comentario $comentario): Response
    {
        return $user->id == $comentario->user_id ? 
        Response::allow() :
        Response::deny('No puedes eliminar de manera definitiva un comentario que no te pertenece');

    }
}
