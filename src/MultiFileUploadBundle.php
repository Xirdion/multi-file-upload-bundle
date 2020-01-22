<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Xirdion\MultiFileUploadBundle\DependencyInjection\MultiFileUploadExtension;

class MultiFileUploadBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new MultiFileUploadExtension();
    }
}
