<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Controller\Field;
use GetOlympus\Zeus\Translate\Controller\Translate;

/**
 * Builds File field.
 *
 * @package Field
 * @subpackage File
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 * @see https://olympus.readme.io/v1.0/docs/file-field
 *
 */

class File extends Field
{
    /**
     * Prepare variables.
     */
    protected function setVars()
    {
        $this->getModel()->setFaIcon('fa-file-code-o');
        $this->getModel()->setHasId(false);
        $this->getModel()->setTemplate('file.html.twig');
    }

    /**
     * Prepare HTML component.
     *
     * @param array $content
     * @param array $details
     *
     * @since 0.0.1
     */
    protected function getVars($content, $details = [])
    {
        // Build defaults
        $defaults = [
            'title' => Translate::t('file.title', [], 'filefield'),
            'file' => false,
        ];

        // Build defaults data
        $vars = array_merge($defaults, $content);

        // Update vars
        $this->getModel()->setVars($vars);
    }
}
