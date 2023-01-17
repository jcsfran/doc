<?php

namespace Julio\Swagger\Src\Contracts;

interface DocumentationInterface
{
    public function struct(bool $auth, string $path, array $params, string $name): string;
}
