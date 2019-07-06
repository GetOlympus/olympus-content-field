<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Controller\Field;
use GetOlympus\Zeus\Translate\Controller\Translate;

/**
 * Builds Content field.
 *
 * @package Field
 * @subpackage Content
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 */

class Content extends Field
{
    /**
     * @var string
     */
    protected $template = 'content.html.twig';

    /**
     * @var string
     */
    protected $textdomain = 'contentfield';

    /**
     * Prepare defaults.
     *
     * @return array
     */
    protected function getDefaults()
    {
        return [
            'title'   => Translate::t('content.title', $this->textdomain),
            'content' => '',
            'debug'   => false,
            'file'    => false,
            'vars'    => [],
        ];
    }

    /**
     * Prepare variables.
     *
     * @param  object  $value
     * @param  array   $contents
     *
     * @return array
     */
    protected function getVars($value, $contents)
    {
        // Get contents
        $vars = $contents;

        // Check file
        if ($vars['file'] && file_exists($vars['file']) && is_readable($vars['file'])) {
            $v = $vars['vars'];
            $vars['content'] = include_once $vars['file'];
            unset($v);
        } else if ($vars['file'] && $vars['debug']) {
            $vars['content'] = Translate::t('content.errors.does_not_exists_or_not_readable', $this->textdomain);
        }

        // Update vars
        return $vars;
    }
}
