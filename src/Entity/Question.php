<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 * @ORM\Table(name="questions")
 */
class Question
{
    public const SINGLE_ANSWER_TYPE = 'single_answer_type';
    public const MULTIPLE_ANSWER_TYPE = 'multiple_answer_type';
    public const TEXT_ANSWER_TYPE = 'text_answer_type';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Test::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $test;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity=AnswerItem::class, mappedBy="question")
     */
    private $answerItems;

    /**
     * @ORM\OneToMany(targetEntity=UserAnswer::class, mappedBy="question")
     */
    private $userAnswers;

    public function __construct()
    {
        $this->answerItems = new ArrayCollection();
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

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @return Collection|AnswerItem[]
     */
    public function getAnswerItems(): Collection
    {
        return $this->answerItems;
    }

    public function addAnswerItem(AnswerItem $answerItem): self
    {
        if (!$this->answerItems->contains($answerItem)) {
            $this->answerItems[] = $answerItem;
            $answerItem->addQuestion($this);
        }

        return $this;
    }

    public function removeAnswerItem(AnswerItem $answerItem): self
    {
        if ($this->answerItems->contains($answerItem)) {
            $this->answerItems->removeElement($answerItem);
            $answerItem->removeQuestion($this);
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
            $userAnswer->setQuestion($this);
        }

        return $this;
    }

    public function removeUserAnswer(UserAnswer $userAnswer): self
    {
        if ($this->userAnswers->contains($userAnswer)) {
            $this->userAnswers->removeElement($userAnswer);
            // set the owning side to null (unless already changed)
            if ($userAnswer->getQuestion() === $this) {
                $userAnswer->setQuestion(null);
            }
        }

        return $this;
    }
}
