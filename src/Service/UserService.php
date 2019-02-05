<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\UserRepository;

use App\Entity\User;

class UserService {

    private $om;

    public function __construct(ObjectManager $om){
        $this->om = $om;
    }

    public function UserInfos($userId){
        $repo = $this->om->getRepository(User::class);
        return $repo->UserInfos($userId);
    }

}
