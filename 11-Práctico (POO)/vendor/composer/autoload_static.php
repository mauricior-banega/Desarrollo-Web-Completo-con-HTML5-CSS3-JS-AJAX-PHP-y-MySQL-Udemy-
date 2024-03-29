<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitafa286634bbde9ae6155e5440ee5a21e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/clases',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitafa286634bbde9ae6155e5440ee5a21e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitafa286634bbde9ae6155e5440ee5a21e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitafa286634bbde9ae6155e5440ee5a21e::$classMap;

        }, null, ClassLoader::class);
    }
}
