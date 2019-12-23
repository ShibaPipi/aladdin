<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ShipmentRequest;
use App\Http\Resources\Api\ShipmentResource;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        return $this->resource(ShipmentResource::collection(
            Shipment::latest()->paginate(10)
        ));
    }

    /**
     * @param ShipmentRequest $request
     * @return mixed
     */
    public function store(ShipmentRequest $request)
    {
        Shipment::updateOrCreate(['id' => $request->id], $request->all());

        return $this->setStatusCode(201)->success('操作成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->success(ShipmentResource::make(Shipment::findOrFail($id)));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Shipment::destroy($id);

        return $this->setStatusCode(204)->success('删除成功');
    }
}
