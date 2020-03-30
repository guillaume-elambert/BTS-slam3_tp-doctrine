<?php
# src/Entity/Answer.php

namespace tpdoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="answers")
*/
class Answer
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
    * @ORM\Column(type="string")
    */
    protected $wording;

    /**
    * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answers")
    */
    protected $question;

    public function __toString()
    {
        $format = "Answer (id: %s, wording: %s)\n";
        return sprintf($format, $this->id, $this->wording);
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
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * @param mixed $wording
     *
     * @return self
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     *
     * @return self
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }
}