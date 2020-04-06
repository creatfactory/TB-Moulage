<?php

namespace App\Controller;

use App\Entity\Types;
use App\Entity\Objets;
use App\Repository\TypesRepository;
use App\Repository\ObjetsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ObjetsController extends AbstractController
{

    /**
     * Affichage de la page des objets d'un type  
     * @return Response
     * 
     * @Route("objets/{id}", name="afficherTypeObjets")
     */
    public function afficherObjetsduType(
        Objets $objet,
        Types $type,
        ObjetsRepository $objetsRepo,
        TypesRepository $typeRealRepo
        ) { 
            
        $listeObjets = $objetsRepo -> findBy (['typeObjets'=>$type->getid()]);

        $typeRealisation = $typeRealRepo->findAll();
        if (empty($listeObjets))
        {
            return $this->render('travaux.html.twig', [
                'type'=> $type,
                'typeRealisation' =>  $typeRealisation
            ]);
        }
        else
        {
            return $this->render(
                'objets.html.twig', [
                    'listeObjets' =>  $listeObjets,
                    'type'=> $type,
                    'typeRealisation' =>  $typeRealisation
                ]
            );
        }
    }
}
