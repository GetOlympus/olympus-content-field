<?php

namespace GetOlympus\Field;

use GetOlympus\Hera\Field\Controller\Field;
use GetOlympus\Hera\Translate\Controller\Translate;

/**
 * Builds File field.
 *
 * @package Field
 * @subpackage File
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 * @see https://olympus.readme.io/v1.0/docs/include-field
 *
 */

class File extends Field
{
    /**
     * @var string
     */
    protected $faIcon = 'fa-file-code-o';

    /**
     * @var boolean
     */
    protected $hasId = false;

    /**
     * @var string
     */
    protected $template = 'file.html.twig';

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
        $this->getField()->setVars($vars);
    }
}
