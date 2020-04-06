<?php

namespace App\Controller;

use App\Entity\Types;
use App\Entity\Objets;
use App\Repository\TypesRepository;
use App\Repository\ObjetsRepository;
use App\Repository\PhotosRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PresPhotosController extends AbstractController
{
    /**
     * @Route("afficherequin", name="photosRequin")
     */
    public function afficherRequin(TypesRepository $typeRealRepo)
    { 
        $typeRealisation = $typeRealRepo->findAll();
        return $this->render(
            'presPhotos.html.twig', [
                'typeRealisation' =>  $typeRealisation
            ]
        );
    }
    /**
    * @Route("presphotos/{id}", name="presPhotos")
    */
    public function afficherPhotosObjet(Objets $Objet,TypesRepository $typeRealRepo,ObjetsRepository $objetsRepo,PhotosRepository $photosRepo)
   { 
       $typeRealisation = $typeRealRepo->findAll();
       $listePhotos=$photosRepo->findBy (['objetPhotos'=>$Objet->getid()]);


       return $this->render(
           'presPhotos2.html.twig', [
               'typeRealisation' =>  $typeRealisation,
               'listePhotos'=> $listePhotos,
               'objet'=>$Objet
           ]
       );
   }
 
}

