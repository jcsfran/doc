<?php

namespace Julio\Swagger\Src;

use Julio\Swagger\Src\Actions\DeleteAction;
use Julio\Swagger\Src\Actions\IndexAction;
use Julio\Swagger\Src\Actions\PostAction;
use Julio\Swagger\Src\Actions\PutAction;
use Julio\Swagger\Src\Actions\ShowAction;

class DocumentationStrategy
{
    private DeleteAction $delete;
    private IndexAction $index;
    private PostAction $post;
    private PutAction $put;
    private ShowAction $show;

    public function __construct()
    {
        $this->delete = new DeleteAction();
        $this->index = new IndexAction();
        $this->post = new PostAction();
        $this->put = new PutAction();
        $this->show = new ShowAction();
    }

    public function handle(
        array $options,
        bool $auth,
        string $path,
        array $params,
        string $structure = null
    ): string {
        foreach ($options as $option) {
            $structure .= $this->{$option}->struct(
                auth: $auth,
                path: $path,
                params: $params,
            );
        }

        return $structure;
    }
}
