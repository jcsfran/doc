<?php

namespace Julio\Swagger\Src\Contracts;

use Julio\Swagger\Src\Structures\{
    BasicStructure,
    AuthStructure,
    ParamsStructure,
};

abstract class Action
{
    protected AuthStructure $authStructure;
    protected ParamsStructure $paramsStructure;
    protected BasicStructure $basicStructure;

    public function __construct()
    {
        $this->authStructure = new AuthStructure();
        $this->paramsStructure = new ParamsStructure();
        $this->basicStructure = new BasicStructure();
    }
}
