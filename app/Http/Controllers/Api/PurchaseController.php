<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\PurchaseRequest;
use App\Http\Resources\Api\PurchaseResource;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        return $this->resource(PurchaseResource::collection(
            Purchase::latest()->paginate(10)
        ));
    }

    /**
     * @param PurchaseRequest $request
     * @return mixed
     */
    public function store(PurchaseRequest $request)
    {
        Post::updateOrCreate(['id' => $request->id], $request->all());

        return $this->setStatusCode(201)->success('操作成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->success(PurchaseResource::make(Purchase::findOrFail($id)));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Purchase::destroy($id);

        return $this->setStatusCode(204)->success('删除成功');
    }
}
