<?php
namespace App\componenets\Mail\Application\Repositories;

use App\componenets\Mail\Application\Mails\SendMail;

use App\componenets\Mail\Application\Models\Mail;
use App\Models\User;

class ResponseRepository
{

    public function createResponseFromRequest(Mail $mail, User $user, array $inputs)
    {
        $response = new Mail;

        $response->setObject($inputs['object']);
        $response->setContent($inputs['content']);
        $response->setSendBy($user);
        $response->setSendTo($mail->getSendBy()->getEmail());

        $response->setParent($mail->getId());
        $response->save();

        \Illuminate\Support\Facades\Mail::to($response->getSendTo())->send(new SendMail($response));

    }
}
