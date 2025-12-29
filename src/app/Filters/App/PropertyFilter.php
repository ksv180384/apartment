<?php

namespace App\Filters\App;

use App\Filters\QueryFilter;

class PropertyFilter extends QueryFilter
{
    public function property_type($value): void
    {
        $propertyTypeIds = explode(',', $value);
        $this->builder->whereIn('property_type_id', $propertyTypeIds);
    }

    public function sort($value): void
    {
        $direction = 'asc';

        if (str_starts_with($value, '-')) {
            $direction = 'desc';
            $value = substr($value, 1);
        }

        if (in_array($value, ['price', 'created_at'])) {
            $this->builder->orderBy($value, $direction);
        }
    }
}
