<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRepository::class)]
class Operation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\JoinTable(name: 'operation_worker')]
    #[ORM\JoinColumn(name: 'operation_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'worker_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Worker::class)]
    private int $worker;

    /**
     * @return int
     */
    public function getWorker(): int
    {
        return $this->worker;
    }

    /**
     * @param int $worker
     */
    public function setWorker(int $worker): void
    {
        $this->worker = $worker;
    }

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
}
