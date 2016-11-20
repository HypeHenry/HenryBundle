<?php

namespace ToolsforeverBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ToolsforeverBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
