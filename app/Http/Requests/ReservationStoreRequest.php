<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;


class ReservationStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => ['required','email'],
           'res_date' => ['required','date', new DateBetween , new TimeBetween],
           'tel_number' => 'required',
           'table_id' => 'required',
           'guest_number' => 'required'
        ];
    }
}
