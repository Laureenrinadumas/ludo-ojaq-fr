<?php

namespace App\Controller;

use App\Entity\Complexity;
use App\Form\ComplexityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/complexity")
 */
class ComplexityController extends AbstractController
{
    /**
     * @Route("/", name="complexity_index", methods={"GET"})
     */
    public function index(): Response
    {
        $complexities = $this->getDoctrine()
            ->getRepository(Complexity::class)
            ->findAll();

        return $this->render('complexity/index.html.twig', [
            'complexities' => $complexities,
        ]);
    }

    /**
     * @Route("/new", name="complexity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $complexity = new Complexity();
        $form = $this->createForm(ComplexityType::class, $complexity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($complexity);
            $entityManager->flush();

            return $this->redirectToRoute('complexity_index');
        }

        return $this->render('complexity/new.html.twig', [
            'complexity' => $complexity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complexity_show", methods={"GET"})
     */
    public function show(Complexity $complexity): Response
    {
        return $this->render('complexity/show.html.twig', [
            'complexity' => $complexity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="complexity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Complexity $complexity): Response
    {
        $form = $this->createForm(ComplexityType::class, $complexity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('complexity_index');
        }

        return $this->render('complexity/edit.html.twig', [
            'complexity' => $complexity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complexity_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Complexity $complexity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$complexity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($complexity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('complexity_index');
    }
}
