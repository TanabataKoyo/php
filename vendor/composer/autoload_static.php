<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit82bc139a6a188d6b24ab61c1bf3120e8
{
    public static $files = array (
        '713b52c45daebafcea655af0c213c935' => __DIR__ . '/..' . '/panique/php-sass/sass-compiler.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Leafo\\ScssPhp\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Leafo\\ScssPhp\\' => 
        array (
            0 => __DIR__ . '/..' . '/leafo/scssphp/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'scss_formatter' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_compressed' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_crunched' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_formatter_nested' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_parser' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scss_server' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
        'scssc' => __DIR__ . '/..' . '/leafo/scssphp/classmap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit82bc139a6a188d6b24ab61c1bf3120e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit82bc139a6a188d6b24ab61c1bf3120e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit82bc139a6a188d6b24ab61c1bf3120e8::$classMap;

        }, null, ClassLoader::class);
    }
}
