<?php

namespace App\Http\Requests;

use App\booking;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'plate_number' => [
              'required', 'min:7','regex:/^\S*$/u'
          ],
        ];
    }
}
