<?php
# get-user2.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\User;

$userRepo = $entityManager->getRepository(User::class);

$limit = 4;
$offset = 2;
$orderBy = ["firstname" => "DESC"];
$usersByRoleWithFilters = $userRepo->findBy(["role" => "user"], $orderBy, $limit, $offset);
echo "Users by role with filters: <br/><br/>";
foreach ($usersByRoleWithFilters as $user) {
    echo $user.'<BR/>';
}
