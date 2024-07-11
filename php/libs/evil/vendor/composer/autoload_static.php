<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf6fcda49e8c08bd0b5cfb440f22d73df
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Evil\\Library\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Evil\\Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf6fcda49e8c08bd0b5cfb440f22d73df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf6fcda49e8c08bd0b5cfb440f22d73df::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf6fcda49e8c08bd0b5cfb440f22d73df::$classMap;

        }, null, ClassLoader::class);
    }
}
