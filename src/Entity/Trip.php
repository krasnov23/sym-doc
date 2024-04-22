<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TripRepository::class)]
class Trip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $departurePlace = null;

    #[ORM\Column(length: 255)]
    private ?string $arrivalPlace = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateOfDepartures = null;

    #[ORM\Column]
    private ?int $seatsAmount = null;

    #[ORM\Column(length: 255)]
    private ?string $driverName = null;

    #[ORM\ManyToOne(cascade: ['persist','remove'], inversedBy: 'trips')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BusInfo $busInfo = null;

    #[ORM\OneToMany(targetEntity: PassengerInfo::class, mappedBy: 'trip')]
    private Collection $passengers;

    public function __construct()
    {
        $this->passengers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparturePlace(): ?string
    {
        return $this->departurePlace;
    }

    public function setDeparturePlace(string $departurePlace): static
    {
        $this->departurePlace = $departurePlace;

        return $this;
    }

    public function getArrivalPlace(): ?string
    {
        return $this->arrivalPlace;
    }

    public function setArrivalPlace(string $arrivalPlace): static
    {
        $this->arrivalPlace = $arrivalPlace;

        return $this;
    }

    public function getDateOfDepartures(): ?\DateTimeImmutable
    {
        return $this->dateOfDepartures;
    }

    public function setDateOfDepartures(\DateTimeImmutable $dateOfDepartures): static
    {
        $this->dateOfDepartures = $dateOfDepartures;

        return $this;
    }

    public function getSeatsAmount(): ?int
    {
        return $this->seatsAmount;
    }

    public function setSeatsAmount(int $seatsAmount): static
    {
        $this->seatsAmount = $seatsAmount;

        return $this;
    }

    public function getDriverName(): ?string
    {
        return $this->driverName;
    }

    public function setDriverName(string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }

    public function getBusInfo(): ?BusInfo
    {
        return $this->busInfo;
    }

    public function setBusInfo(?BusInfo $busInfo): static
    {
        $this->busInfo = $busInfo;

        return $this;
    }

    /**
     * @return Collection<int, PassengerInfo>
     */
    public function getPassengers(): Collection
    {
        return $this->passengers;
    }

    public function addPassenger(PassengerInfo $passenger): static
    {
        if (!$this->passengers->contains($passenger)) {
            $this->passengers->add($passenger);
            $passenger->setTrip($this);
        }

        return $this;
    }

    public function removePassenger(PassengerInfo $passenger): static
    {
        if ($this->passengers->removeElement($passenger)) {
            // set the owning side to null (unless already changed)
            if ($passenger->getTrip() === $this) {
                $passenger->setTrip(null);
            }
        }

        return $this;
    }
}
