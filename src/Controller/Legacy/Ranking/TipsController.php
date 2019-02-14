<?php

namespace App\Controller\Legacy\Ranking;

use App\Domain\Message\QueryBus;
use App\Domain\Message\Ranking\GetTipsByChampionship;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TipsController extends AbstractController
{
    /**
     * @Route("/ranking/tips/{championshipId}", name="ranking_tips")
     *
     * @param QueryBus $queryBus
     * @return JsonResponse
     */
    public function __invoke(QueryBus $queryBus, int $championshipId)
    {
        $tips = $queryBus->query(new GetTipsByChampionship($championshipId));
        return $this->json($tips);
    }
}
