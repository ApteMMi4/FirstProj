<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionUrlRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'payment' => 'numeric|min:99|max:14000',
            'sum' => 'numeric|min:99|max:14000',

            ];
    }

    public function messages()
    {
        return [
            'payment.numeric' => 'Сумма не должна быть пустой',
            'sum.numeric' => 'Сумма не должна быть пустой',
            'payment.min' => 'Сумма должна быть не меньше 100 UAH',
            'payment.max' => 'Сумма должна быть не больше 14000 UAH',
            'sum.min' => 'Сумма должна быть не меньше 100 UAH',
            'sum.max' => 'Сумма должна быть не больше 14000 UAH',
        ];
    }
}
