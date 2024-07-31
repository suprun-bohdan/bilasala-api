<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Repositories\ItemRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    protected ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function index()
    {
        $items = $this->itemRepository->getAll();
        return new JsonResponse(ItemResource::collection($items), Response::HTTP_OK);
    }

    public function show($id)
    {
        $item = $this->itemRepository->getById($id);
        return new JsonResponse(new ItemResource($item), Response::HTTP_OK);
    }

    public function store(StoreItemRequest $request)
    {
        $item = $this->itemRepository->create($request->validated());
        return new JsonResponse(new ItemResource($item), Response::HTTP_CREATED);
    }

    public function update(UpdateItemRequest $request, $id)
    {
        $item = $this->itemRepository->update($id, $request->validated());
        return new JsonResponse(new ItemResource($item), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $this->itemRepository->delete($id);
        return new JsonResponse(['message' => 'Item deleted successfully'], Response::HTTP_OK);
    }
}
