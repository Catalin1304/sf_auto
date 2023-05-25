<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[Table('user')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected $id;
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Role $role = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Profile $profile = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Owner $owner = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Role|null
     */
    public function getRole(): ?Role
    {
        return $this->role;
    }

    /**
     * @param Role|null $role
     */
    public function setRole(?Role $role): void
    {
        $this->role = $role;
    }

    /**
     * @return Profile|null
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile|null $profile
     */
    public function setProfile(?Profile $profile): void
    {
        $this->profile = $profile;
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



}
