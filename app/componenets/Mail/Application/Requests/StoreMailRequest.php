<?php

namespace App\componenets\Mail\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'mail.send_to' =>"bail|required|email",
            'mail.object' => "bail|required|string|max:255",
            'mail.content' => "bail|required",
        ];
    }
}
