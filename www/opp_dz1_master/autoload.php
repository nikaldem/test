<?php

function __autoload($myclass)
{
    if (file_exists(__DIR__ . '/controllers/' . $myclass . '.php')){
        require __DIR__ . '/controllers/' . $myclass . '.php';
    } elseif (file_exists(__DIR__ . '/models/' . $myclass . '.php')) {
        require __DIR__ . '/models/' . $myclass . '.php';
    } elseif (file_exists(__DIR__ . '/classes/' . $myclass . '.php')) {
        require __DIR__ . '/classes/' . $myclass . '.php';
    }
}