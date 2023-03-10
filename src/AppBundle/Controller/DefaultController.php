<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enclosure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $enclosures = $this->getDoctrine()
            ->getRepository(Enclosure::class)
            ->findAll();

        return $this->render('default/index.html.twig', [
            'enclosures' => $enclosures,
        ]);
    }
}
