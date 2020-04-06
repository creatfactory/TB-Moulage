<?php

namespace App\Controller;

use App\Entity\Types;
use App\Repository\TypesRepository;
use App\Entity\Objets;
use App\Repository\ObjetsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypesController extends AbstractController
{
    /**
     * Affichage de la page d'accueil avec les types de réalisation  
     * @return Response
     * 
     * @Route("types", name="afficherTypes")
     */
    public function afficherTypes(TypesRepository $typeRealRepo)
    { 
        $typeRealisation = $typeRealRepo->findAll();
        return $this->render(
            'types.html.twig', [
                'typeRealisation' =>  $typeRealisation
            ]
        );
    }
    /**
     * @Route("accueil", name="accueil")
     */
    public function acceuil(TypesRepository $typeRealRepo)
    { 
        $typeRealisation = $typeRealRepo->findAll();
        return $this->render(
            'accueil.html.twig', [
                'typeRealisation' =>  $typeRealisation
            ]
        );
    }
    /**
     * @Route("/", name="home")
     */
    public function home(TypesRepository $typeRealRepo)
    { 
        $typeRealisation = $typeRealRepo->findAll();
        return $this->render(
            'accueil.html.twig', [
                'typeRealisation' =>  $typeRealisation
            ]
        );
    }
    /**
     * @Route("contact", name="contact")
     */
    public function contact(TypesRepository $typeRealRepo)
    { 
        $typeRealisation = $typeRealRepo->findAll();
        return $this->render(
            'contact.html.twig', [
                'typeRealisation' =>  $typeRealisation
            ]
        );
    }
}