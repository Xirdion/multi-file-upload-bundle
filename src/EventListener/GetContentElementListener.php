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

use Contao\Combiner;
use Contao\ContentModel;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\FormFieldModel;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class GetContentElementListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("getContentElement")
     *
     * @param ContentModel $contentModel
     * @param string       $buffer
     * @param $element
     *
     * @return string
     */
    public function onGetContentElement(ContentModel $contentModel, string $buffer, $element): string
    {
        if ($contentModel->type === 'form') {
            // Get the form fields by form-ID
            $formFields = FormFieldModel::findByPid((int) $contentModel->form);

            if ($formFields) {
                /** @var FormFieldModel $formField */
                foreach ($formFields as $formField) {
                    if (!$formField->invisible && $formField->type === 'multifileupload') {
                        // add the js and css.
                        $jsCombiner = new Combiner();

                        // add dropzonejs
                        $jsCombiner->add('bundles/multifileupload/dropzone.js');
                        $jsCombiner->add('bundles/multifileupload/dropzone.config.js');
                        $GLOBALS['TL_BODY']['dropzonejs'] = sprintf('<script src="%s"></script>', $jsCombiner->getCombinedFile());

                        $GLOBALS['TL_CSS']['dropzonejs'] = 'bundles/multifileupload/dropzone.css';
                        break;
                    }
                }
            }
        }

        return $buffer;
    }
}
