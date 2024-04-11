<?php

namespace App\Policies;

use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComunidadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comunidad $comunidad): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comunidad $comunidad): Response
    {
        return $user->id === $comunidad->user_id
            ? Response::allow()
            : Response::deny('No puedes editar esta comunidad no te pertenece.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comunidad $comunidad): Response
    {
        return $user->id === $comunidad->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar esta comunidad no te pertenece.');
    }
}
