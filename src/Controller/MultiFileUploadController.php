<?php

declare(strict_types=1);

/*
 * This file is part of MultiFileUploadBundle.
 *
 * (c) Thomas Voggenreiter
 *
 * @license LGPL-3.0-or-later
 */

namespace Xirdion\MultiFileUploadBundle\Controller;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\FormFieldModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Xirdion\MultiFileUploadBundle\Form\MultiFileUploadForm;

class MultiFileUploadController extends AbstractController
{
    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var string
     */
    protected $projectDir;

    /**
     * DropzoneUploadController constructor.
     *
     * @param ContaoFramework $framework
     * @param string          $projectDir
     */
    public function __construct(ContaoFramework $framework, SessionInterface $session, string $projectDir)
    {
        $framework->initialize();

        $this->session = $session;
        $this->projectDir = $projectDir;
    }

    /**
     * @Route("/xirdion/multifileupload/upload", name="xirdion_multifileupload_upload")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function uploadFiles(Request $request): JsonResponse
    {
        $formField = FormFieldModel::findById((int) $request->request->get('element'));
        if (!$formField || $formField->type !== 'multifileupload') {
            return new JsonResponse('data is incorrect', 400);
        }

        $uploadWidget = new MultiFileUploadForm($formField->row());

        /** @var UploadedFile $file */
        foreach ($request->files as $paramName => $file) {
            // TODO sanitize file name in $_FILES

            try {
                $uploadWidget->validate();
            } catch (\Exception $e) {
                return new JsonResponse(['errors' => [$e->getMessage()]], 400);
            }

            if ($uploadWidget->hasErrors()) {
                return new JsonResponse(['errors' => $uploadWidget->getErrors()], 400);
            }

            // Save file entry in custom session array
            if (!$this->session->has('multifileuplaod')) {
                $this->session->set('multifileuplaod', []);
            }

            $fileCollection = (array) $this->session->get('multifileuplaod');

            $fileCollection[$paramName][] = $_SESSION['FILES'][$paramName];

            $this->session->set('multifileuplaod', $fileCollection);
        }

        return new JsonResponse('my Response Error', 200);
    }

    // TODO: remove file: remove entry from session

    public function removeFiles(Request $request): void
    {
    }
}
