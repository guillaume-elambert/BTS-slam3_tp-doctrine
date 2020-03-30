<?php
# bootstrap.php
// La ligne suivante permet d'utiliser autoload.php qui charge les classes manquantes
require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'vendor', 'autoload.php']);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entitiesPath = [
    join(DIRECTORY_SEPARATOR, [__DIR__, "src", "Entity"])
];

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

// Connexion à la base de données poll à créer sous PHPMyAdmin
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'port'     => 3308,
    'charset'  => 'utf8',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'slam3_tpdoctrine',
];

$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
?>
