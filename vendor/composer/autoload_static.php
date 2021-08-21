<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit264187e6723a24ac7eacc81d3f0a8b3c
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WilliamCosta\\DotEnv\\' => 20,
            'WilliamCosta\\DatabaseManager\\' => 29,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WilliamCosta\\DotEnv\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/dot-env/src',
        ),
        'WilliamCosta\\DatabaseManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/database-manager/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit264187e6723a24ac7eacc81d3f0a8b3c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit264187e6723a24ac7eacc81d3f0a8b3c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit264187e6723a24ac7eacc81d3f0a8b3c::$classMap;

        }, null, ClassLoader::class);
    }
}