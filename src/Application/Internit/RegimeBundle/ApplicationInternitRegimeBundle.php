<?php

namespace App\Application\Internit\RegimeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitRegimeBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitRegimeBundle';
    }
}