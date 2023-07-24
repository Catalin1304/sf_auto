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
    private ?Brand $brand = null;


    #[ORM\Column(length: 255)]
    private ?string $plateNumber = null;


    #[ORM\ManyToOne(targetEntity: Owner::class, )]
    #[ORM\JoinColumn(nullable: false)]
    private ?Owner $owner = null;

//    #[ORM\JoinTable(name: 'vehicle_operation')]
//    #[ORM\JoinColumn(name: 'vehicle_id', referencedColumnName: 'id')]
//    #[ORM\InverseJoinColumn(name: 'operation_id', referencedColumnName: 'id')]
//    #[ORM\ManyToMany(targetEntity: Operation::class)]
//    private int $operation;

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

    /**
     * @return Brand|null
     */
    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand|null $brand
     */
    public function setBrand(?Brand $brand): void
    {
        $this->brand = $brand;
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
     * @return Owner|null
     */
    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    /**
     * @param Owner|null $owner
     */
    public function setOwner(?Owner $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string|null
     */




}
