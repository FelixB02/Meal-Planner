<?php

namespace App\Entity;

use App\Repository\WeekRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeekRepository::class)]
class Week
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?user $fk_user = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_monday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_tuesday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_wednesday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_thursday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_friday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_saturday = null;

    #[ORM\ManyToOne(inversedBy: 'weeks')]
    private ?meal $fk_sunday = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkUser(): ?user
    {
        return $this->fk_user;
    }

    public function setFkUser(?user $fk_user): self
    {
        $this->fk_user = $fk_user;

        return $this;
    }

    public function getFkMonday(): ?meal
    {
        return $this->fk_monday;
    }

    public function setFkMonday(?meal $fk_monday): self
    {
        $this->fk_monday = $fk_monday;

        return $this;
    }

    public function getFkTuesday(): ?meal
    {
        return $this->fk_tuesday;
    }

    public function setFkTuesday(?meal $fk_tuesday): self
    {
        $this->fk_tuesday = $fk_tuesday;

        return $this;
    }

    public function getFkWednesday(): ?meal
    {
        return $this->fk_wednesday;
    }

    public function setFkWednesday(?meal $fk_wednesday): self
    {
        $this->fk_wednesday = $fk_wednesday;

        return $this;
    }

    public function getFkThursday(): ?meal
    {
        return $this->fk_thursday;
    }

    public function setFkThursday(?meal $fk_thursday): self
    {
        $this->fk_thursday = $fk_thursday;

        return $this;
    }

    public function getFkFriday(): ?meal
    {
        return $this->fk_friday;
    }

    public function setFkFriday(?meal $fk_friday): self
    {
        $this->fk_friday = $fk_friday;

        return $this;
    }

    public function getFkSaturday(): ?meal
    {
        return $this->fk_saturday;
    }

    public function setFkSaturday(?meal $fk_saturday): self
    {
        $this->fk_saturday = $fk_saturday;

        return $this;
    }

    public function getFkSunday(): ?meal
    {
        return $this->fk_sunday;
    }

    public function setFkSunday(?meal $fk_sunday): self
    {
        $this->fk_sunday = $fk_sunday;

        return $this;
    }
}
