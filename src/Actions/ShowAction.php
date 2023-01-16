<?php

namespace Julio\Swagger\Src\Actions;

use Julio\Swagger\Src\Contracts\Action;
use Julio\Swagger\Src\Contracts\DocumentationInterface;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ShowAction extends Action implements DocumentationInterface
{
    public function struct(bool $auth, string $path, array $params): string
    {
        $structuredYaml = str_repeat(config('documentation.space'), 4) . "get:" . PHP_EOL;
        $structuredYaml .=
            str_repeat(config('documentation.space'), 6) .
            '$ref: ' .
            config('documentation.actions.show') .
            PHP_EOL;

        $this->createStructure(auth: $auth, path: $path, params: $params);

        return $structuredYaml;
    }

    public function createStructure(bool $auth, string $path, array $params): void
    {
        $structure = PHP_EOL;

        if ($auth) {
            $structure .= $this->authStructure->header();
        }

        if (!empty($params)) {
            $structure .= $this->paramsStructure->header(params: $params);
        }

        $structure .= $this->basicStructure->info();
        $structure .= $this->basicStructure->response(statusCode: HttpResponse::HTTP_OK);

        if ($auth) {
            $structure .= $this->authStructure->response();
        }

        if (!empty($params)) {
            $structure .= $this->paramsStructure->response();
        }

        $this->basicStructure->createFile(
            fileName: config('documentation.actions.show'),
            structure: $structure,
            path: $path
        );
    }
}
