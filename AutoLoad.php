<?php

class AutoLoad
{
    private static $_instance = null;

    private function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    public static function _instance(): AutoLoad
    {
        if (!self::$_instance) {
            self::$_instance = new AutoLoad();
        }
        return self::$_instance;
    }

    public function load($class): void
    {
        if (is_readable(trailingslashit(plugin_dir_path(__FILE__) . 'class') . $class . '.php')) {
            if (file_exists(trailingslashit(plugin_dir_path(__FILE__) . 'class') . $class . '.php')) {
                include_once trailingslashit(plugin_dir_path(__FILE__) . 'class') . $class . '.php';
            }
        }
        return;
    }
}

AutoLoad::_instance();
