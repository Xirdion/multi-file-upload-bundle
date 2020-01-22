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

$GLOBALS['TL_LANG']['FFL']['multifileupload'] = ['Datei-Upload DropZone', 'Datei-Upload DropZone'];
$GLOBALS['TL_LANG'][$table]['maxUploadSize'] = ['Upload-Größe', 'Geben Sie hier die maximal erlaubte Größe in MB der Dateien an. "0" bedeutet, dass die Größe nicht begrenzt ist.'];
$GLOBALS['TL_LANG'][$table]['maxUploadCount'] = ['Upload-Anzahl', 'Geben Sie hier die maximal erlaubte Anzahl der Dateien an. "0" bedeutet, dass die Anzahl nicht begrenzt ist.'];
