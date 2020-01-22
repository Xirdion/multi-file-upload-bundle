<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle\Form;

use Contao\FormFileUpload;
use Contao\StringUtil;

/**
 * Class FormMultiFileUpload.
 *
 * @property int $maxUploadSize
 * @property int $maxUploadCount
 */
class MultiFileUploadForm extends FormFileUpload
{
    protected $strTemplate = 'form_multi_file_upload';

    protected $strPrefix = 'widget widget-multi-file-upload';

    public function __get($strKey)
    {
        switch ($strKey) {
            case 'dropzoneExtensions':
                $extensions = $this->arrConfiguration['extensions'];
                $uploadTypes = StringUtil::trimsplit(',', strtolower($extensions));

                return '.' . implode(',.', $uploadTypes);

            case 'maxFileSize':
                $maxFileSize = (int) $this->maxUploadSize;

                return $maxFileSize === 0 ? 256 : $maxFileSize;
            case 'maxFiles':
                $maxFiles = (int) $this->maxUploadCount;

                return $maxFiles === 0 ? 'null' : $maxFiles;
        }

        return parent::__get($strKey);
    }

    public function generate(): string
    {
        return '';
    }
}
