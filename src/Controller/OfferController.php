<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    #[Route('/', name: 'offers.list')]

    public function offerList(OfferRepository $repo): Response
    {
        $offer_list = $repo->findAll();
        return $this->render('app/offer.list.html.twig', [
            "offer_list" => $offer_list
        ]);
    }

    #[Route("/offers/{id}", name: 'offers.show')]

    public function show(Offer $offer)
    {
        return $this->render("app/offer.show.html.twig", [
            "offer" => $offer
        ]);
    }
}
