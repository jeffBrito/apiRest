<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8847d9710b05f77320b85cf2bb865c7d
{
    public static $files = array (
        'b6493c14bbda84267c0017ea96d00d52' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8847d9710b05f77320b85cf2bb865c7d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8847d9710b05f77320b85cf2bb865c7d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8847d9710b05f77320b85cf2bb865c7d::$classMap;

        }, null, ClassLoader::class);
    }
}