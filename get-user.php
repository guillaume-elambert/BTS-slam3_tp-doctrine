<?php
# get-users.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\User;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find(1);
echo "User by primary key:<br/>";
echo $user.'<br/><br/>';

$allUsers = $userRepo->findAll();
echo "All users:<br/>";
foreach ($allUsers as $user) {
    echo $user.'<br/>';
}

$usersByRole = $userRepo->findBy(["role" => "admin"]);
echo "Users by role:<br/><br/>";
foreach ($usersByRole as $user) {
    echo $user.'<br/><br/>';
}

$usersByRoleAndFirstname = $userRepo->findBy(["role" => "user", "firstname" => "First 2"]);
echo "Users by role and firstname:<br/>";
foreach ($usersByRoleAndFirstname as $user) {
    echo $user.'<br/>';
}
