<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\Table;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[Table('vehicle')]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Brand::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $brand = null;


    #[ORM\Column(length: 255)]
    private ?string $plateNumber = null;

    #[ORM\ManyToOne(targetEntity: FosUser::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $user = null;

    #[ORM\ManyToOne(targetEntity: Vehicle::class, )]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $owner = null;

    #[ORM\JoinTable(name: 'vehicle_operation')]
    #[ORM\JoinColumn(name: 'vehicle_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'operation_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Operation::class)]
    private int $operation;

    /**
     * @return int
     */
    public function getOperation(): int
    {
        return $this->operation;
    }

    /**
     * @param int $operation
     */
    public function setOperation(int $operation): void
    {
        $this->operation = $operation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }


    public function getPlateNumber(): ?string
    {
        return $this->plateNumber;
    }

    public function setPlateNumber(string $plateNumber): self
    {
        $this->plateNumber = $plateNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }


}
