<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enclosure;
use AppBundle\Factory\DinosaurFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

    /**
     * @Route("/grow", name="grow_dinosaur")
     * @Method({"POST"})
     */
    public function growAction(Request $request, DinosaurFactory $dinosaurFactory)
    {
        $manager = $this->getDoctrine()->getManager();
        $enclosure = $manager->getRepository(Enclosure::class)
            ->find($request->request->get('enclosure'));
        $specification = $request->request->get('specification');
        $dinosaur = $dinosaurFactory->growFromSpecification($specification);
        $dinosaur->setEnclosure($enclosure);
        $enclosure->addDinosaur($dinosaur);
        $manager->flush();
        $this->addFlash('success', sprintf(
            'Grew a %s in enclosure #%d',
            mb_strtolower($specification),
            $enclosure->getId()
        ));
        return $this->redirectToRoute('homepage');
    }
}
