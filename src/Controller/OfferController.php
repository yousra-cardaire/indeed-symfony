<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use App\Repository\OfferRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route("/offers/{id}/edit", name: "offers.edit")]

    public function edit(Request $request, Offer $offer)
    {
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("offers.list");
        }

        return $this->render("app/edit.html.twig", [
            "offer" => $offer,
            "form" => $form->createView(),
        ]);
    }

    #[Route("/offers/{id}/delete", name: "offers.delete")]

    public function delete(Request $request, Offer $offer)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($offer);
        $manager->flush();

        return $this->redirectToRoute("offers.list");
    }

    #[Route("/offers/add", name: "offers.create")]

    public function create(Request $request)
    {
        $offer = new Offer();

        $form = $this->createForm(OfferType::class, $offer);
        $offer->setCreatedAt(new \DateTime());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offer = $form->getData();

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($offer);
            $manager->flush();

            return $this->redirectToRoute("offers.list");
        }

        return $this->render("app/create.html.twig", [
            "form" => $form->createView()
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
