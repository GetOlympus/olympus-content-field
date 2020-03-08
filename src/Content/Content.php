<?php

namespace GetOlympus\Dionysos\Field;

use GetOlympus\Zeus\Field\Field;

/**
 * Builds Content field.
 *
 * @package    DionysosField
 * @subpackage Content
 * @author     Achraf Chouk <achrafchouk@gmail.com>
 * @since      0.0.1
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
    protected function getDefaults() : array
    {
        return [
            'title'   => parent::t('content.title', $this->textdomain),
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
    protected function getVars($value, $contents) : array
    {
        // Get contents
        $vars = $contents;

        // Check file
        if ($vars['file'] && file_exists($vars['file']) && is_readable($vars['file'])) {
            $v = $vars['vars'];
            $vars['content'] = include_once $vars['file'];
            unset($v);
        } else if ($vars['file'] && $vars['debug']) {
            $vars['content'] = parent::t('content.errors.does_not_exists_or_not_readable', $this->textdomain);
        }

        // Update vars
        return $vars;
    }
}
