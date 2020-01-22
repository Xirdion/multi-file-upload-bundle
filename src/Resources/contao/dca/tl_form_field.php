<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

$table = 'tl_form_field';

$GLOBALS['TL_DCA'][$table]['palettes']['multifileupload'] = '{type_legend},type,name,label;{fconfig_legend},mandatory,maxUploadSize,maxUploadCount,extensions;{store_legend:hide},storeFile;{expert_legend:hide},class,accesskey,tabindex,fSize;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

$GLOBALS['TL_DCA'][$table]['fields']['maxUploadSize'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['maxUploadSize'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
    'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'default' => 0],
];

$GLOBALS['TL_DCA'][$table]['fields']['maxUploadCount'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['maxUploadCount'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
    'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'default' => 0],
];
