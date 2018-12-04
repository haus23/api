<?php

namespace App\Controller\Ranking;

use App\Domain\Message\Ranking\QueryAllPublishedChampionships;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class ChampionshipsController extends AbstractController
{
    /**
     * @Route("/ranking/championships", name="ranking_championships")
     *
     * @param MessageBusInterface $queryBus
     * @return JsonResponse
     */
    public function __invoke(MessageBusInterface $queryBus)
    {
        $championships = $queryBus->dispatch(new QueryAllPublishedChampionships());
        return $this->json($championships);
    }
}