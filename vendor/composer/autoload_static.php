<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9667e85b7cbc1bd3043a7ed3d8cc315a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AndyBeak\\IniChecker\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AndyBeak\\IniChecker\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9667e85b7cbc1bd3043a7ed3d8cc315a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9667e85b7cbc1bd3043a7ed3d8cc315a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}