<?php

namespace App\Controller;

use App\Repository\TripRepository;
use App\Service\TripService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    public function __construct(private TripService $tripService)
    {
    }

    #[Route('/trips', name: 'get_all_trips',methods: ['GET'])]
    public function getTrips(): JsonResponse
    {
        $trips = $this->tripService->getAllTrips();

        return $this->json($trips);
    }

    /**
     * @throws Exception
     */
    #[Route('/find-trip', name: 'find_trip',methods: ['GET'])]
    public function getTripsByFilter(Request $request): JsonResponse
    {
        $trips = $this->tripService->getTripsByFilters($request);

        return $this->json($trips);
    }

}
