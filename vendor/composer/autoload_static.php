<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit624a64d90f7dda43875a79e0d520206a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit624a64d90f7dda43875a79e0d520206a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit624a64d90f7dda43875a79e0d520206a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit624a64d90f7dda43875a79e0d520206a::$classMap;

        }, null, ClassLoader::class);
    }
}