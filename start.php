<?php

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * @author Paweł Podgórski
 */


function addInput(string $label, bool $allowEmpty = false): ?string
{
    while (true) {
        echo $label;
        $line = trim(fgets(STDIN));
        if ($line != '') {
            break;
        }
        if ($allowEmpty) {
            return null;
        }
    }
    return $line;
}

function addInputWithPredefined(string $label, array $correctAnswers): ?string
{
    while (true) {
        echo $label;
        $line = strtolower(trim(fgets(STDIN)));
        if (in_array($line, $correctAnswers)) {
            break;
        }
    }
    return $line;
}

$welcomeText = <<<TEX
    
    
    Thanks for starting with a LiteApi framework
    In a few steps we will prepare your project:
        - composer.json
        - .gitignore
        - cache adapter and directory
        - logger directory
    
    
    TEX;

echo $welcomeText;


// Set composer info
$composer = json_decode(file_get_contents('composer.json'), true);

$composer['name'] = addInput('Project name: ');
$composer['description'] = addInput('Project description: ', true) ?? '';
$composer['license'] = addInput('License: ', true);
if ($composer['license'] === null) {
    unset($composer['license']);
}
$authors = addInput('Authors (separated by comma): ', true);
if ($authors === null) {
    unset($composer['authors']);
} else {
    $composer['authors'] = explode(',', $authors);
}
$namespace = addInput('PSR-4 autoload namespace: ');
$directory = addInput('PSR-4 autoload directory: ');
if (!str_ends_with($namespace, '\\\\')) {
    $namespace .= '\\';
}
$composer['autoload']['psr-4'][$namespace] = $directory;

if (!file_put_contents('composer.json', json_encode($composer, JSON_PRETTY_PRINT))) {
    echo 'Cannot save composer data to json' . PHP_EOL;
    var_export($composer);
    exit(1);
}
