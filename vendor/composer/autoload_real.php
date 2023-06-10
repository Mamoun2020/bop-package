<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit86d28a9899bc4ff815b74693c6f2008c
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

        spl_autoload_register(array('ComposerAutoloaderInit86d28a9899bc4ff815b74693c6f2008c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit86d28a9899bc4ff815b74693c6f2008c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit86d28a9899bc4ff815b74693c6f2008c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
