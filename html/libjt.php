<?php
/**
 * @package     JT.Library
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2015 Guido De Gobbis - JoomTools. All rights reserved.
 * @license     GNU General Public License version 3 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Html css class.
 *
 * @package     JT.Library
 * @subpackage  Html
 * @since       1.0
 */
abstract class JHtmlLibJT
{
    /**
     * Extension name to use in the asset calls
     * Basically the media/com_xxxxx folder to use
     */
    const EXTENSION = 'libjt';

    /**
     * Array containing information for loaded files
     *
     * @var  array
     */
    protected static $loaded = array();

    /**
     * Load repeatable.
     *
     * @return  void
     */
    public static function repeatable()
    {
        if (!empty(static::$loaded[__METHOD__]))
        {
            return;
        }

        JHtml::_('script', self::EXTENSION . '/repeatable.js', true, true);

        static::$loaded[__METHOD__] = true;
    }
}