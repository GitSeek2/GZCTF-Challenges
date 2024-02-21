<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcd97b5b01ddcefd7fe264d49b94d6a11
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitcd97b5b01ddcefd7fe264d49b94d6a11', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcd97b5b01ddcefd7fe264d49b94d6a11', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcd97b5b01ddcefd7fe264d49b94d6a11::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}