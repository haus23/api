<?php

namespace App\Domain\Message;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class QueryBus
{
    use HandleTrait;
    
    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /**
     * @param object|Envelope $query
     * @return mixed
     */
    public function query($query)
    {
        return $this->handle($query);
    }
}
