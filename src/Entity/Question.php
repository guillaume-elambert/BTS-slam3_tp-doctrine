<?php
# src/Entity/Question.php

namespace tpdoctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="questions")
*/
class Question

{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    protected $id;

    /**
    * @ORM\Column(type="text")
    */
    protected $wording;

    /**
    * @ORM\OneToMany(targetEntity=Answer::class, cascade={"persist", "remove"}, mappedBy="question"))
    */
    protected $answers;

    /**
    * @ORM\ManyToOne(targetEntity=Poll::class, inversedBy="questions")
    */
    protected $poll;



    // le constructeur crée la collection de réponses
    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }
    
    
    public function getAnswers()
    {
        return $this->answers;
    }
     
    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);
        $answer->setQuestion($this);
    }


    public function __toString()
    {
        $format = "Question (id: %s, wording: %s, answers: {<br/>";
        $str = sprintf($format, $this->id, $this->wording);
        $i = 1;
        foreach ($this->answers as $anAnswer) {
            $format = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;answer %s : %s<br/>";
            $str .= sprintf($format, $i, $anAnswer);
            $i++;
        }
            $str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>';
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
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @param mixed $poll
     *
     * @return self
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;

        return $this;
    }
}
