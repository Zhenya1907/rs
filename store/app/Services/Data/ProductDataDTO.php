<?php

namespace App\Services\Data;

class ProductDataDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public int $quantity,
        public array $properties = []
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['price'],
            $data['quantity'],
            $data['properties'] ?? []
        );
    }
}
