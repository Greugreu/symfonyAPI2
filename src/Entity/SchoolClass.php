<?php

namespace App\Entity;

use App\Repository\SchoolClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=ClassStudent::class, mappedBy="studentClass")
     */
    private $classStudents;
    private $classStudent;

    public function __construct()
    {
        $this->classStudents = new ArrayCollection();
    }

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

    public function getClassStudent(): ?ClassStudent
    {
        return $this->classStudent;
    }

    public function setClassStudent(?ClassStudent $classStudent): self
    {
        // unset the owning side of the relation if necessary
        if ($classStudent === null && $this->classStudent !== null) {
            $this->classStudent->setStudentClass(null);
        }

        // set the owning side of the relation if necessary
        if ($classStudent !== null && $classStudent->getStudentClass() !== $this) {
            $classStudent->setStudentClass($this);
        }

        $this->classStudent = $classStudent;

        return $this;
    }

    /**
     * @return Collection|ClassStudent[]
     */
    public function getClassStudents(): Collection
    {
        return $this->classStudents;
    }

    public function addClassStudent(ClassStudent $classStudent): self
    {
        if (!$this->classStudents->contains($classStudent)) {
            $this->classStudents[] = $classStudent;
            $classStudent->setStudentClass($this);
        }

        return $this;
    }

    public function removeClassStudent(ClassStudent $classStudent): self
    {
        if ($this->classStudents->removeElement($classStudent)) {
            // set the owning side to null (unless already changed)
            if ($classStudent->getStudentClass() === $this) {
                $classStudent->setStudentClass(null);
            }
        }

        return $this;
    }
}
