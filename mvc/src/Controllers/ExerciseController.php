<?php

namespace Lucas\Mvc\Controllers;

use Lucas\Mvc\Models\Exercise;

class ExerciseController extends Controller
{
    private Exercise $exercise;

    public function __construct()
    {
        $this->configureCors();
        $this->exercise = new Exercise();
    }

    public function index(): void
    {
        $this->view($this->getViewsFolder() . "/search.php");
    }

    public function exercises(): void
    {
        $name = filter_input(INPUT_GET, 'name') ?? '';
        $exercises = $name
            ? $this->exercise->searchByName(htmlspecialchars($name))
            : [];

        $this->json(['data' => $exercises]);
    }
}
