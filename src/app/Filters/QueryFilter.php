<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

    public function __construct(Request $request = null)
    {
        $this->request = $request ?: request();
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }

            if (is_string($value) && strlen($value)) {
                $this->$name($value);
            } elseif (is_array($value) && !empty($value)) {
                $this->$name($value);
            } elseif (is_numeric($value)) {
                $this->$name($value);
            } elseif (is_bool($value)) {
                $this->$name($value);
            }
        }

        return $this->builder;
    }

    public function filters(): array
    {
        return $this->request->query();
    }
}
