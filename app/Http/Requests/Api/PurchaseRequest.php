<?php

namespace App\Http\Requests\Api;

class PurchaseRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'POST':
                return [
                    'reference_no' => ['required'],
//                    'order_no',
//                    'contract_no',
//                    'order_date',
//                    'supplier_name',
//                    'product_name',
//                    'product_standard',
//                    'product_quantity',
//                    'unit',
//                    'price_yuan',
//                    'price_dollar',
//                    'refund_rate',
//                    'pay_type',
//                    'delivery_date',
//                    'total_price_yuan',
//                    'total_price_dollar',
//                    'is_paid',
//                    'pay_date',
                ];
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
            default:
                return [];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'reference_no.required' => ':attribute 必传',
        ];
    }
}
