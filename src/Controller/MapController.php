<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransactionsRepository;
use Symfony\Component\HttpFoundation\Request;

class MapController extends AbstractController
{
    /**
     * @Route("/", name="map", methods={"POST|GET"})
     * @return Response
     */
    public function index(Request $request, TransactionsRepository $transactionsRepo): Response
    {
        $transactions = $transactionsRepo->findBy([], null, 200, null);

        return $this->render('map/index.html.twig', [
            'transactions' => $transactions,
    ]);
    }
}
