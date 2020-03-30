<?php
# create-question.php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

use tpdoctrine\Entity\Question;
use tpdoctrine\Entity\Answer;

// Instanciation de la question

$qu = new Question();
$qu->setWording("Doctrine 2 est-il un bon ORM ?");

$ans1=new Answer();
$ans1->setWording("Oui, bien sûr !");

$ans2=new Answer();
$ans2->setWording("Non, peut mieux faire !");

$qu->addAnswer($ans1);
$qu->addAnswer($ans2);
// Gestion de la persistance
$entityManager->persist($qu);
$entityManager->flush();
// Vérification du résultat
echo $qu;