<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf5602172d7e92d1b11a0490ec9866404
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf5602172d7e92d1b11a0490ec9866404', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf5602172d7e92d1b11a0490ec9866404', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf5602172d7e92d1b11a0490ec9866404::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
