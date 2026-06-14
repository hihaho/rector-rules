<?php

final class NotARouter
{
    public function middleware(string $middleware): self
    {
        return $this;
    }
}

(new NotARouter())->middleware('auth:sanctum');
