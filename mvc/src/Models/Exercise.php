<?php

namespace Lucas\Mvc\Models;

class Exercise
{
    // Simula os dados do banco de dados.
    private array $source = [];

    public function __construct()
    {
        $this->source = [
            [
                'id' => uniqid(),
                'name' => "Exercise 01",
            ],
            [
                'id' => uniqid(),
                'name' => "Exercise 02",
            ],
            [
                'id' => uniqid(),
                'name' => "Exercise 03",
            ],
            [
                'id' => uniqid(),
                'name' => "Exercise 04",
            ],
            [
                'id' => uniqid(),
                'name' => "Exercise 05",
            ],
            [
                'id' => uniqid(),
                'name' => "Exercise 11",
            ],
        ];
    }

    public function findAll(): array
    {
        return $this->source;
    }

    public function searchByName(string $name): array
    {
        // Simula uma consulta usando LIKE no banco de dados.
        return array_values(
            array_filter(
                $this->source,
                fn (array $exercise): bool => str_contains(
                    mb_strtolower($exercise['name']),
                    mb_strtolower($name)
                )
            )
        );
    }
}
