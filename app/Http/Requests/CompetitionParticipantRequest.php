<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CompetitionParticipantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // rules for validating competition participant data - required to save data to db
        return [
            'name' => 'required|min:3|max:55',
            'surname' => 'required|min:3|max:55',
            'phoneNumber' => 'required|regex:/^[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{3}$/',
            'email' => 'required|email:rfc,dns',
            'receiptNumber' => 'required|max:150',
            'purchaseDate' => 'required|date_format:Y-m-d h:i:s|before:tomorrow|after:' . config('constants.startDateForCompetition'),
            'receiptPhoto' => [
                'required',
                File::types(['jpg, jpeg, png'])->max('5mb'),
            ],
            'statuteAcceptance' => 'required|boolean',
            'consentMarketingAcceptance' => 'boolean|nullable',
        ];
    }
}
