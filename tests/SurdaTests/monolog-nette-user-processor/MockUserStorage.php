<?php

namespace SurdaTests\Monolog;


use Nette;

class MockUserStorage implements Nette\Security\IUserStorage
{
    private $auth = false;
    private $identity;


    public function setAuthenticated($state)
    {
        $this->auth = $state;
    }


    public function isAuthenticated()
    {
        return $this->auth;
    }


    public function getIdentity()
    {
        return $this->identity;
    }


    public function setIdentity(Nette\Security\IIdentity $identity = null)
    {
        $this->identity = $identity;
    }


    public function setExpiration($time, $flags = 0)
    {
    }


    public function getLogoutReason()
    {
    }
}