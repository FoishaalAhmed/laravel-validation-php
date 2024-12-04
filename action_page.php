<?php

// Autoload dependencies
require 'vendor/autoload.php';

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Illuminate\Container\Container;

// Step 1: Set up the Translator
$filesystem = new Filesystem();
$loader = new FileLoader($filesystem, __DIR__.'/lang');

$locale = 'bn'; // Set the default language
$translator = new Translator($loader, $locale);

// Step 2: Create the Validation Factory
$container = new Container();
$validationFactory = new Factory($translator, $container);

$rules = [
    'name' => 'required|min:3',
    'email' => 'required|email',
    'password' => 'required|min:8|confirmed',
];

// Step 4: Validate the Data
$validator = $validationFactory->make($_POST, $rules);

if ($validator->fails()) {
    // Validation failed
    session_start();
    $_SESSION['errors'] = $validator->errors()->toArray();
    $_SESSION['old'] = $data;

    // Redirect back to the form
    header('Location: index.php');
    exit;
} else {
    // Validation passed
    echo "Validation successful!";
}
