<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Table;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[Table('fos_user')]
class FosUser extends BaseUser
{
    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\Id, ORM\GeneratedValue(strategy: 'AUTO')]
    protected $id;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
