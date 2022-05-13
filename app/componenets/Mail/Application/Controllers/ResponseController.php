<?php
namespace App\componenets\Mail\Application\Controllers;

use App\componenets\Mail\Application\Models\Mail;
use App\componenets\Mail\Application\Repositories\ResponseRepository;
use App\componenets\Mail\Application\Requests\StoreResponseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class ResponseController extends Controller
{
    public function __construct(protected ResponseRepository $responseRepository)
    {
    }

    /**
     *
     * La vue de la création d'une réponse
     *
     */

    public function create(Mail $mail)
    {
        return view('response::response.create', compact('mail'));
    }

    /**
     *
     * La sauvegarde de la réponse d'un mail
     *
     * @param StoreResponseRequest $request
     */

    public function store(StoreResponseRequest $request, Mail $mail)
    {
        $this->responseRepository->createResponseFromRequest($mail, $request->user(), $request->input('response'));

        return redirect()->route('mail.index');
    }
}
