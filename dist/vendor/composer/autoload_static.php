<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit572a5e8731c8701aaf69da1c9f4c2366
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit572a5e8731c8701aaf69da1c9f4c2366::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit572a5e8731c8701aaf69da1c9f4c2366::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit572a5e8731c8701aaf69da1c9f4c2366::$classMap;

        }, null, ClassLoader::class);
    }
}
