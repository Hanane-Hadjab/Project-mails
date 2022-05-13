<?php

namespace App\componenets\Mail\Application\Controllers;

use App\componenets\Mail\Application\Models\Mail;
use App\componenets\Mail\Application\Repositories\MailRepository;
use App\componenets\Mail\Application\Requests\StoreMailRequest;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function __construct(protected MailRepository $mailRepository)
    {
    }

    /**
     *
     * Affichage de tous les messages envoyés par le use connecté
     *
     */

    public function index()
    {
        $mails = $this->mailRepository->getMailsSentBy(Auth::user());

        $received = false;

        return view('mail::mail.index', compact(['mails', 'received']));
    }

    /**
     *
     * La vue de la création d'un mail
     *
     */

    public function create()
    {
        $this->authorize('create', Mail::class);

        return view('mail::mail.create');
    }

    /**
     *
     * La vue d'affichage d'un mail
     *
     * @param Mail $mail
     */

    public function show(Mail $mail)
    {
        $this->authorize('show', $mail);

        $responses = $this->mailRepository->getResponsesOf($mail);

        return view('mail::mail.show', compact(['mail', 'responses']));
    }

    /**
     *
     * La vue de suppression d'un mail
     *
     * @param Mail $mail
     */

    public function delete(Mail $mail)
    {
        $this->authorize('delete', $mail);

        $deleted = $this->mailRepository->deleteMail($mail);

        return redirect()->route('mail.index');
    }

    /**
     *
     * La sauvegarde de creation d'un mail
     *
     * @param StoreMailRequest $request
     */

    public function store(StoreMailRequest $request)
    {
        $this->mailRepository->createMailFromRequest($request->user(), $request->input('mail'));

        return redirect()->route('mail.index');
    }

    public function getReceivedMails(\Illuminate\Support\Facades\Request $request)
    {
        $mails = $this->mailRepository->getReceivedEmail(Auth::user());

        $received = true;

        return view('mail::mail.index', compact(['mails', 'received']));
    }
}
