<?php
# create-user.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\User;

// Instanciation de l'utilisateur

$admin = new User();
$admin->setFirstname("First");
$admin->setLastname("LAST");
$admin->setRole("admin");

// Gestion de la persistance
//$entityManager->persist($admin);
$entityManager->flush();

// Vérification du résultats
echo "Identifiant de l'utilisateur créé : ", $admin->getId();
