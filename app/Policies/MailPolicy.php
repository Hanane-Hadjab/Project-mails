<?php

namespace App\Policies;

use App\componenets\Mail\Application\Models\Mail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class MailPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\componenets\Mail\Application\Models\Mail $mail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user, Mail $mail)
    {
        return $user->getId() === $mail->getSendBy()->getId()
            ? Response::allow()
            : Response::deny('You do not own this mail.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\componenets\Mail\Application\Models  $mail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mail $mail)
    {
        return $user->getId() === $mail->getSendBy()->getId()
            ? Response::allow()
            : Response::deny('You do not own this mail.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\componenets\Mail\Application\Models\Mail  $mail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mail $mail)
    {
        return $user->getId() === $mail->getSendBy()->getId()
            ? Response::allow()
            : Response::deny('You do not own this mail.');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\componenets\Mail\Application\Models\Mail  $mail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getId() === Auth::user()->id
            ? Response::allow()
            : Response::deny('You do not own this mail.');
    }

}
