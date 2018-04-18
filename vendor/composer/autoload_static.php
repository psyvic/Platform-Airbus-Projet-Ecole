<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17f177bbce37a9ad49b639bbecd8b221
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17f177bbce37a9ad49b639bbecd8b221::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17f177bbce37a9ad49b639bbecd8b221::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit17f177bbce37a9ad49b639bbecd8b221::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
