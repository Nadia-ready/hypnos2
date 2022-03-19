<?php

namespace App\Controller\admin;

use App\Entity\Establishments;
use App\Form\EstablishmentsType;
use App\Repository\EstablishmentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentsController extends AbstractController
{

    /**
     * @Route("/admin/establishments", name="admin_establishments_list")
     */
    public function adminEstablishmentsList(EstablishmentsRepository $establishmentsRepository): Response
    {
        $establishmentsAdmin = $establishmentsRepository->findAll();

        return $this->render('admin/establishmentsList.html.twig', [
            'establishments' => $establishmentsAdmin
        ]);
    }

    /**
     * @Route("/admin/establishments/delete/{id}", name="admin_establishments_delete")
     */
    public function admminEstablishmentsDelete($id, EstablishmentsRepository $establishmentsRepository, EntityManagerInterface $entityManager): Response
    {
        $establishments = $establishmentsRepository->find($id);

        $entityManager->remove($establishments);
        $entityManager->flush();

        return $this->redirectToRoute('admin_establishments-list');
    }

    /**
     * @Route("/admin/establishments/insert", name="admin_establishments_list_insert")
     */
    public function adminEstablishmentsInsert(EntityManagerInterface $entityManager, Request $request): Response
    {
        $establishments = new Establishments();

        $establishmentsForm = $this->createForm(EstablishmentsType::class, $establishments);

        //bind the form to the request data
        $establishmentsForm->handleRequest($request);

        if($establishmentsForm->isSubmitted() && $establishmentsForm->isValid()) {
            $entityManager->persist($establishments);
            $entityManager->flush();
        }

        return $this->render('admin/establishmentsListInsert.html.twig', [
            'establishmentsForm' => $establishmentsForm->createView()
        ]);
    }

    /**
     * @Route("/admin/establishments/update/{id}", name="admin_establishments_list_update")
     */
    public function adminEstablishmentsUpdate($id, EstablishmentsRepository $establishmentsRepository, EntityManagerInterface $entityManager, Request $request): Response
    {
        $establishments = $establishmentsRepository->find($id);

        $establishmentsForm = $this->createForm(EstablishmentsType::class, $establishments);

        $establishmentsForm->handleRequest($request);

        if($establishmentsForm->isSubmitted() && $establishmentsForm->isValid()) {
            $entityManager->persist($establishments);
            $entityManager->flush();
        }

        return $this->render('admin/establishmentsListInsert.html.twig', [
            'establishmentsForm' => $establishmentsForm->createView()
        ]);
    }
}
