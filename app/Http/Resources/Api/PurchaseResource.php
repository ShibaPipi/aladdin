<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reference_no' => $this->reference_no,
            'order_no' => $this->order_no,
            'contract_no' => $this->contract_no,
            'order_date' => $this->order_date,
            'supplier_name' => $this->supplier_name,
            'product_name' => $this->product_name,
            'product_standard' => $this->product_standard,
            'product_quantity' => $this->product_quantity,
            'unit' => $this->unit,
            'price_yuan' => $this->price_yuan,
            'price_dollar' => $this->price_dollar,
            'refund_rate' => $this->refund_rate,
            'pay_type' => $this->pay_type,
            'delivery_date' => $this->delivery_date,
            'total_price_yuan' => $this->total_price_yuan,
            'total_price_dollar' => $this->total_price_dollar,
            'is_paid' => $this->is_paid,
            'pay_date' => $this->pay_date,
            'created_at' => (string)$this->created_at,
        ];
    }
}
