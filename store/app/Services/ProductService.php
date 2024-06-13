<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    private const PAGINATION_COUNT = 40;

    /**
     * Get a paginated list of products with optional relationships and filters
     */
    public function getProducts(array $data): LengthAwarePaginator
    {
        $query = Product::query();

        // Загрузка связанных данных
        $this->loadRelations($query, $data['with'] ?? []);

        // Фильтрация по свойствам
        $this->applyPropertyFilters($query, $data['properties'] ?? []);

        return $query->paginate(self::PAGINATION_COUNT);
    }

    /**
     * Load relationships based on the provided data
     */
    protected function loadRelations(Builder $query, array $relations): void
    {
        foreach ($relations as $relation) {
            $this->addRelation($query, $relation);
        }
    }

    /**
     * Add a single relation to the query
     */
    protected function addRelation(Builder $query, string $relation): void
    {
        if (strpos($relation, 'properties.') === 0) {
            $property = substr($relation, strlen('properties.'));
            $query->with(['properties' => function ($q) use ($property) {
                $q->where('name', $property);
            }]);
        } else {
            $query->with($relation);
        }
    }

    /**
     * Apply property filters based on the provided data
     */
    protected function applyPropertyFilters(Builder $query, array $properties): void
    {
        foreach ($properties as $property => $values) {
            $this->addPropertyFilter($query, $property, $values);
        }
    }

    /**
     * Add a single property filter to the query
     */
    protected function addPropertyFilter(Builder $query, string $property, array $values): void
    {
        $query->whereHas('properties', function ($q) use ($property, $values) {
            $q->where('name', $property)
                ->whereIn('value', $values);
        });
    }
}
