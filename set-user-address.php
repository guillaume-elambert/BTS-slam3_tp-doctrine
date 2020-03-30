<?php
# set-user-address.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\User;
use tpdoctrine\Entity\Address;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find(1);

$address = new Address();
$address->setRue("Champ de Mars, 5 Avenue Anatole");
$address->setVille("Paris");
$address->setPays("France");
var_dump($user);echo "<br/>";
var_dump($address);echo "<br/>";

$user->setAddress($address);
var_dump($user);echo "<br/>";
$entityManager->persist($address);
$entityManager->flush();
