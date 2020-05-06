<?php

namespace App\Controller;

use App\Entity\Frequency;
use App\Form\FrequencyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/frequency")
 */
class FrequencyController extends AbstractController
{
    /**
     * @Route("/", name="frequency_index", methods={"GET"})
     */
    public function index(): Response
    {
        $frequencies = $this->getDoctrine()
            ->getRepository(Frequency::class)
            ->findAll();

        return $this->render('frequency/index.html.twig', [
            'frequencies' => $frequencies,
        ]);
    }

    /**
     * @Route("/new", name="frequency_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $frequency = new Frequency();
        $form = $this->createForm(FrequencyType::class, $frequency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($frequency);
            $entityManager->flush();

            return $this->redirectToRoute('frequency_index');
        }

        return $this->render('frequency/new.html.twig', [
            'frequency' => $frequency,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frequency_show", methods={"GET"})
     */
    public function show(Frequency $frequency): Response
    {
        return $this->render('frequency/show.html.twig', [
            'frequency' => $frequency,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="frequency_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Frequency $frequency): Response
    {
        $form = $this->createForm(FrequencyType::class, $frequency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('frequency_index');
        }

        return $this->render('frequency/edit.html.twig', [
            'frequency' => $frequency,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frequency_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Frequency $frequency): Response
    {
        if ($this->isCsrfTokenValid('delete'.$frequency->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($frequency);
            $entityManager->flush();
        }

        return $this->redirectToRoute('frequency_index');
    }
}
