<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
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
            'product_quantity' => $this->product_quantity,
            'unit' => $this->unit,
            'pack_specification' => $this->pack_specification,
            'pack_net' => $this->pack_net,
            'pack_weight' => $this->pack_weight,
            'pack_quantity' => $this->pack_quantity,
            'total_net' => $this->total_net,
            'total_weight' => $this->total_weight,
            'is_pallet' => $this->is_pallet,
            'pallet_quantity' => $this->pallet_quantity,
            'total_volume' => $this->total_volume,
            'delivery_date' => $this->delivery_date,
            'forwarder_name' => $this->forwarder_name,
            'is_paid' => $this->is_paid,
            'pay_date' => $this->pay_date,
            'transit_state' => $this->transit_state,
            'created_at' => (string)$this->created_at,
        ];
    }
}
