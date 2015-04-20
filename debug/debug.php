<?php
// no direct access
defined('_JEXEC') or die();

class LibJTDebug
{
    protected static $instance;

    public static function getInstance($enable = false, array $options = null)
    {
        // Only create the object if it doesn't exist.
        if (empty(self::$instance))
        {
            require_once(dirname(__FILE__) . '/class/FirePHP.class.php');

            $firephp = FirePHP::getInstance(true);

            if(is_array($options) && !empty($options))
            {
                $firephp->setOptions($options);
                $options = $firephp->getOptions();
            }

            $firephp->group('LibJTDebug Startup',array('Collapsed' => true,'Color' => '#FF4000'));
            $firephp->log('FirePHP enabled!');
            $firephp->log('FirePHP: Options Set - maxObjectDepth:'.$options['maxObjectDepth'].
                ' maxArrayDepth:'.$options['maxArrayDepth'].
                ' useNativeJsonEncode:'.$options['useNativeJsonEncode'].
                ' includeLineNumbers:'.$options['includeLineNumbers']);
            $firephp->groupEnd();
            $firephp->setEnabled($enable);
            self::$instance = $firephp;
        }

        return self::$instance;
    }
}

