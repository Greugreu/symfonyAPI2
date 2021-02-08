<?php

namespace App\Entity;

use App\Repository\ClassStudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassStudentRepository::class)
 */
class ClassStudent
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity=SchoolClass::class, inversedBy="classStudents")
     */
    private $studentClass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getStudentClass(): ?SchoolClass
    {
        return $this->studentClass;
    }

    public function setStudentClass(?SchoolClass $studentClass): self
    {
        $this->studentClass = $studentClass;

        return $this;
    }
}
