<?php

namespace Julio\Swagger\Src\Structures;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AuthStructure
{
    public function header(): string
    {
        $structure = str_repeat(config('documentation.space'), 6) . "security:" . PHP_EOL;
        $structure .= str_repeat(config('documentation.space'), 8) . "- bearerAuth: []" . PHP_EOL;

        return $structure;
    }

    public function response(): string
    {
        $statusCode = HttpResponse::HTTP_UNAUTHORIZED;
        $structure = str_repeat(config('documentation.space'), 8) . $statusCode . ":" . PHP_EOL;
        $structure .= str_repeat(config('documentation.space'), 10) . '$ref' . ": '../'" . PHP_EOL;

        return $structure;
    }
}
