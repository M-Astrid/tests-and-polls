<?php

namespace App\Entity;

use App\Repository\AnswerItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerItemRepository::class)
 * @ORM\Table(name="answer_items")
 */
class AnswerItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRight;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, inversedBy="answerItems")
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity=UserAnswer::class, mappedBy="chosenVariants")
     */
    private $userAnswers;

    public function __construct()
    {
        $this->question    = new ArrayCollection();
        $this->userAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getIsRight(): ?bool
    {
        return $this->isRight;
    }

    public function setIsRight(bool $isRight): self
    {
        $this->isRight = $isRight;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->question->contains($question)) {
            $this->question->removeElement($question);
        }

        return $this;
    }

    /**
     * @return Collection|UserAnswer[]
     */
    public function getUserAnswers(): Collection
    {
        return $this->userAnswers;
    }

    public function addUserAnswer(UserAnswer $userAnswer): self
    {
        if (!$this->userAnswers->contains($userAnswer)) {
            $this->userAnswers[] = $userAnswer;
            $userAnswer->addChosenVariant($this);
        }

        return $this;
    }

    public function removeUserAnswer(UserAnswer $userAnswer): self
    {
        if ($this->userAnswers->contains($userAnswer)) {
            $this->userAnswers->removeElement($userAnswer);
            $userAnswer->removeChosenVariant($this);
        }

        return $this;
    }
}
