<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $arrival_date;

    #[ORM\Column(type: 'date')]
    private $departure_date;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'establishment')]
    private $user;

    #[ORM\ManyToMany(targetEntity: Establishments::class, inversedBy: 'reservations')]
    private $establishment;

    #[ORM\ManyToMany(targetEntity: Suites::class, inversedBy: 'reservations')]
    private $suite;

    public function __construct()
    {
        $this->establishment = new ArrayCollection();
        $this->suite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrival_date;
    }

    public function setArrivalDate(\DateTimeInterface $arrival_date): self
    {
        $this->arrival_date = $arrival_date;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Establishments>
     */
    public function getEstablishment(): Collection
    {
        return $this->establishment;
    }

    public function addEstablishment(Establishments $establishment): self
    {
        if (!$this->establishment->contains($establishment)) {
            $this->establishment[] = $establishment;
        }

        return $this;
    }

    public function removeEstablishment(Establishments $establishment): self
    {
        $this->establishment->removeElement($establishment);

        return $this;
    }

    /**
     * @return Collection<int, Suites>
     */
    public function getSuite(): Collection
    {
        return $this->suite;
    }

    public function addSuite(Suites $suite): self
    {
        if (!$this->suite->contains($suite)) {
            $this->suite[] = $suite;
        }

        return $this;
    }

    public function removeSuite(Suites $suite): self
    {
        $this->suite->removeElement($suite);

        return $this;
    }
}
