<?php

namespace App\componenets\Mail\Application\Repositories;

use App\componenets\Mail\Application\Mails\SendMail;
use App\componenets\Mail\Application\Models\Mail;
use App\Models\User;

class MailRepository
{
    /**
     * Une fonction pour récupérer les messages envoyé par le user
     *
     * @param User $user
     */

    public function getMailsSentBy(User $user)
    {
        return Mail::where('send_by', $user->id)
            ->whereDoesntHave('parent')
            ->get();
    }

    /**
     * La création d'un mail
     */

    public function createMailFromRequest(User $user, array $inputs)
    {
        $mail = new Mail;
        $mail->setSendTo($inputs['send_to']);
        $mail->setObject($inputs['object']);
        $mail->setContent($inputs['content']);
        $mail->setSendBy($user);

        $mail->save();

        \Illuminate\Support\Facades\Mail::to($mail->getSendTo())->send(new SendMail($mail));

    }

    /**
     * La suppression d'un mail
     *
     * @param Mail $mail
     */

    public function deleteMail(Mail $mail)
    {
        return $mail->delete();
    }

    /**
     * La récupération des reponses  d'un mail
     *
     * @param Mail $mail
     */

    public function getResponsesOf(Mail $mail)
    {
        return Mail::where('response_id', $mail->getId())->get();
    }

    public function getReceivedEmail(User $user)
    {
        return Mail::where('send_to', $user->getEmail())
            ->whereDoesntHave('parent')
            ->get();
    }
}
