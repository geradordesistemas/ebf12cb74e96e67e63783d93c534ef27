<?php

namespace App\Application\Internit\AlunoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ApplicationInternitAlunoBundle extends Bundle
{
    /** {@inheritdoc} */
    public function getParent()
    {
        return 'ApplicationInternitAlunoBundle';
    }
}