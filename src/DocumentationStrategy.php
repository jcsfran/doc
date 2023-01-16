<?php

namespace Julio\Swagger\Src;

// use App\Services\Documentation\Actions\DeleteAction;
// use App\Services\Documentation\Actions\IndexAction;
// use App\Services\Documentation\Actions\PostAction;
// use App\Services\Documentation\Actions\PutAction;
// use App\Services\Documentation\Actions\ShowAction;

class DocumentationStrategy
{
    // protected IndexAction $index;

    public function __construct()
    {
        // $this->index = new IndexAction();
        // $this->show = new ShowAction();
        // $this->post = new PostAction();
        // $this->put = new PutAction();
        // $this->delete = new DeleteAction();
    }

    public function handle(array $options, bool $auth, string $path, array $params): string
    {
        $structure = 'strategy';
        // foreach ($options as $option) {
        //     $structure .= $this->{$option}->struct(
        //         auth: $auth,
        //         path: $path,
        //         params: $params
        //     );
        // }

        return $structure;
    }
}
