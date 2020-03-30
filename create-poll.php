<?php
# create-poll.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\Poll;
use tpdoctrine\Entity\Question;

// Instanciation de la question
$poll = new Poll();
$poll->setTitle("Premier sondage");
$poll->setCreated();

$pollRepo = $entityManager->getRepository(Poll::class);
$poll = $pollRepo->find(1);


$questionRepo = $entityManager->getRepository(Question::class);
$qu1 = $questionRepo->find(1);
$qu2 = $questionRepo->find(2);
$qu3 = $questionRepo->find(3);

$poll->addQuestion($qu1);
$poll->addQuestion($qu2);
$poll->addQuestion($qu3);

// Gestion de la persistance
$entityManager->persist($poll);
$entityManager->flush();


// Vérification du résultat
echo $poll;