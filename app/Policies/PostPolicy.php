<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
   

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        return $post->user_id ==  $user->id ? 
            Response::allow()
            : Response::deny('No puedes editar un post que no te pertenece');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        return $post->user_id ==  $user->id ? 
            Response::allow()
            : Response::deny('No puedes eliminar un post que no te pertenece');
    }

    public function canAcceptOrDeny(User $user, Post $post): Response{
        return $post->comunidad->user_id == $user->id && $post->estado_moderacion =="en revision" ? 
            Response::allow()
            : Response::deny('No puedes aceptar o rechazar un post en una comunidad que no te pertenece');
    }
}
