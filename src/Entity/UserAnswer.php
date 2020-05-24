<?php

namespace App\Entity;

use App\Repository\UserAnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserAnswerRepository::class)
 * @ORM\Table(name="user_answers")
 */
class UserAnswer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="userAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=UserAnswerSet::class, inversedBy="userAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userAnswerSet;

    /**
     * @ORM\ManyToMany(targetEntity=AnswerItem::class, inversedBy="userAnswers")
     */
    private $chosenVariants;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    public function __construct()
    {
        $this->chosenVariants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getUserAnswerSet(): ?UserAnswerSet
    {
        return $this->userAnswerSet;
    }

    public function setUserAnswerSet(?UserAnswerSet $userAnswerSet): self
    {
        $this->userAnswerSet = $userAnswerSet;

        return $this;
    }

    /**
     * @return Collection|AnswerItem[]
     */
    public function getChosenVariants(): Collection
    {
        return $this->chosenVariants;
    }

    public function addChosenVariant(AnswerItem $chosenVariant): self
    {
        if (!$this->chosenVariants->contains($chosenVariant)) {
            $this->chosenVariants[] = $chosenVariant;
        }

        return $this;
    }

    public function removeChosenVariant(AnswerItem $chosenVariant): self
    {
        if ($this->chosenVariants->contains($chosenVariant)) {
            $this->chosenVariants->removeElement($chosenVariant);
        }

        return $this;
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
}
