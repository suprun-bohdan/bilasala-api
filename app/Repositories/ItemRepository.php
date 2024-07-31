<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository
{
    public function getAll(): Collection
    {
        return Item::all();
    }

    public function getById($id)
    {
        return Item::findOrFail($id);
    }

    public function create(array $data)
    {
        return Item::create($data);
    }

    public function update($id, array $data)
    {
        $item = Item::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return $item;
    }
}
