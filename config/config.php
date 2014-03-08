<?php
// centos symfony directories
$sf_symfony_lib_dir  = '/usr/lib/php/pear/symfony';
$sf_symfony_data_dir = '/usr/lib/php/pear/data/symfony';

if (!file_exists($sf_symfony_lib_dir)) {
    // ubuntu symfony directories
    $sf_symfony_lib_dir  = '/usr/share/php/symfony';
    $sf_symfony_data_dir = '/usr/share/php/data/symfony';
}

if (!file_exists($sf_symfony_lib_dir)) {
    // windows symfony directories(vertrigo)
    $sf_symfony_lib_dir  = 'C:\VertrigoServ\Php\PEAR\symfony';
    $sf_symfony_data_dir = 'C:\VertrigoServ\Php\data\symfony';
}