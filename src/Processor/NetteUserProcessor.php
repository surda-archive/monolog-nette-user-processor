<?php

namespace Surda\Monolog\Processor;


use Nette\Security\User;

class NetteUserProcessor
{

    private $user;


    /**
     * NetteUserProcessor constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @param array $record
     * @return array
     */
    public function __invoke(array $record)
    {
        $record['extra']['nette-user'] = [
            'id' => $this->user->getId(),
            'loggedIn' => $this->user->isLoggedIn(),
        ];

        return $record;
    }


}
