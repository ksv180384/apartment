<?php

namespace App\Services;

use App\Models\Address;
use App\Models\BuildingClass;
use Illuminate\Database\Eloquent\Collection;

class AddressService
{
    public function create(array $addressData): Address
    {
        $address = Address::query()->create($addressData);

        return $address;
    }

    public function update(int $id, array $addressData): Address
    {
        $address = Address::query()->findOrFail($id);

        $address->update($addressData);

        return $address;
    }

    public function destroy(int $id): void
    {
        $address = Address::query()->findOrFail($id);

        $address->delete();
    }
}
