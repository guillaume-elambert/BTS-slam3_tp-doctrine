<?php
# src/Entity/Question.php

namespace tpdoctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
date_default_timezone_set('Europe/Paris');


/**
* @ORM\Entity
* @ORM\Table(name="polls")
*/
class Poll
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;


    /**
    * @ORM\OneToMany(targetEntity=Question::class, cascade={"persist", "remove"}, mappedBy="poll"))
    */
    protected $questions;

    /**
    * @ORM\Column(type="text")
    */
    protected $title;

    /**
    * @ORM\Column(type="date")
    */
    protected $created;

    // le constructeur crée la collection de réponses
    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }


    public function __toString()
    {
        $format = "Question (id: %s, title: %s, created date: %s, questions : {<br/>";
        $str = sprintf($format, $this->id, $this->title, $this->created->format('Y-m-d'));
        $i = 1;
        foreach ($this->questions as $aQuestion) {
            $format = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;question %s : %s <br/>";
            $str .= sprintf($format, $i, $aQuestion);
            $i++;
        }
        $str .= "<br/>}";
        return $str;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        return $this->questions;
    }


    public function addQuestion(Question $question)
    {
        $this->questions->add($question);
        $question->setPoll($this);
    }

    /**
     * @param mixed $questions
     *
     * @return self
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     *
     * @return self
     */
    public function setCreated()
    {
        $this->created = new \DateTime("now");

        return $this;
    }
}
