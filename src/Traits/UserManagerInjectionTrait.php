<?php

namespace App\Traits;

use App\Manager\UserManager;

trait UserManagerInjectionTrait
{
    public UserManager $userManager;

    /**
     * @requires
     */
    public function getUserManager(): UserManager
    {
        return $this->userManager;
    }

    public function setUserManager(UserManager $userManager): UserManager
    {
        return $this->userManager = $userManager;
    }
}