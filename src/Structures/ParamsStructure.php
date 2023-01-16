<?php

namespace Julio\Swagger\Src\Structures;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ParamsStructure
{
    public function header(array $params): string
    {
        $structure = str_repeat(config('documentation.space'), 6) . "parameters:" . PHP_EOL;

        foreach ($params as $param) {
            $structure .= str_repeat(config('documentation.space'), 8) . "- in: path" . PHP_EOL;
            $structure .= str_repeat(config('documentation.space'), 10) . 'name: ' . $param . PHP_EOL;
            $structure .= str_repeat(config('documentation.space'), 10) . "schema:" . PHP_EOL;
            $structure .= str_repeat(config('documentation.space'), 12) . "type: ''" . PHP_EOL;
            $structure .= str_repeat(config('documentation.space'), 10) . "required: true" . PHP_EOL;
            $structure .= str_repeat(config('documentation.space'), 10) . "description: ''" . PHP_EOL;
        }

        return $structure;
    }

    public function response(): string
    {
        $statusCode = HttpResponse::HTTP_NOT_FOUND;
        $structure = str_repeat(config('documentation.space'), 8) . $statusCode . ":" . PHP_EOL;
        $structure .= str_repeat(config('documentation.space'), 10) . '$ref' . ": '../'" . PHP_EOL;

        return $structure;
    }
}
