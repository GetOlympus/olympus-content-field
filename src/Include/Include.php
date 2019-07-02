<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Controller\Field;
use GetOlympus\Zeus\Translate\Controller\Translate;

/**
 * Builds Include field.
 *
 * @package Field
 * @subpackage Include
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 * @see https://olympus.readme.io/v1.0/docs/include-field
 *
 */

class Include extends Field
{
    /**
     * @var string
     */
    protected $template = 'include.html.twig';

    /**
     * @var string
     */
    protected $textdomain = 'includefield';

    /**
     * Prepare defaults.
     *
     * @return array
     */
    protected function getDefaults()
    {
        return [
            'title' => Translate::t('include.title', $this->textdomain),
            'data'  => '',
            'debug' => false,
            'file'  => false,
            'vars'  => [],
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
            $vars['data'] = include_once $vars['file'];
            unset($v);
        } else if (empty($vars['data']) && $vars['debug']) {
            $vars['data'] = Translate::t('include.errors.does_not_exists_or_not_readable', $this->textdomain);
        }

        // Update vars
        return $vars;
    }
}
