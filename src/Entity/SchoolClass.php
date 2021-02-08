<?php

namespace App\Entity;

use App\Repository\SchoolClassRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SchoolClassRepository::class)
 */
class SchoolClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $className;

    /**
     * @ORM\Column(type="integer")
     */
    private $classSize;

    /**
     * @ORM\ManyToOne(targetEntity=Schools::class, inversedBy="schoolClasses")
     */
    private $schoolHasClasses;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    public function getClassSize(): ?int
    {
        return $this->classSize;
    }

    public function setClassSize(int $classSize): self
    {
        $this->classSize = $classSize;

        return $this;
    }

    public function getSchoolHasClasses(): ?Schools
    {
        return $this->schoolHasClasses;
    }

    public function setSchoolHasClasses(?Schools $schoolHasClasses): self
    {
        $this->schoolHasClasses = $schoolHasClasses;

        return $this;
    }
}
