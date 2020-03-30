<?php
# get-user3.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\User;

$userRepo = $entityManager->getRepository(User::class);

//$usersByRole = $userRepo->findBy(["role" => "admin"]);
$usersByRole = $userRepo->findByRole("admin");
echo "Users by role:<br/><br/>";
foreach ($usersByRole as $user) {
    echo $user.'<BR/>';
}
