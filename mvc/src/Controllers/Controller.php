<?php

namespace Lucas\Mvc\Controllers;

abstract class Controller
{
    protected array $headers = [];

    protected function getViewsFolder(): string
    {
        return __DIR__ . "/../Views";
    }

    protected function setHeader(string $key, string $value): static
    {
        $this->headers[$key] = $value;
        return $this;
    }

    protected function configureCors()
    {
        $this->setHeader("Access-Control-Allow-Origin", "*");
        $this->setHeader("Access-Control-Allow-Headers", "*");
        $this->setHeader("Access-Control-Allow-Methods", "*");
    }

    protected function output(string $response, int $status = 200): void
    {
        foreach ($this->headers as $header => $value) {
            header("{$header}: $value");
        }

        http_response_code($status);
        echo $response;
        exit;
    }

    protected function json($response, int $status = 200): void
    {
        $this->setHeader("Content-Type", "application/json");
        $this->output(json_encode($response), $status);
    }

    protected function view(string $view, int $status = 200): void
    {
        ob_start();
        include $view;
        $page = ob_get_contents();
        ob_end_clean();

        $this->output($page, $status);
    }
}
