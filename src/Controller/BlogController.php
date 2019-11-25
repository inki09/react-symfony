<?php

namespace App\Controller;

use App\Entity\Customer\Pub;
use App\Entity\Province;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
            $province = $this->em->getRepository(Province::class);
        dump(  $entityManager = $this->getDoctrine()->getManager('customer')
        ->getRepository(Pub::class));
        die();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
