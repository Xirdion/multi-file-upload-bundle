<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Form;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class PrepareFormDataListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("prepareFormData")
     *
     * @param array $submittedData
     * @param array $labels
     * @param array $fields
     * @param Form  $form
     */
    public function onPrepareFormData(array &$submittedData, array $labels, array $fields, Form $form): void
    {
    }
}
