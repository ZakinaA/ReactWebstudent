<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;

class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }

    public function accueil(): Response
    {
        /*return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);*/
        return new response('<html><body>Salut Les SIO</body></html>');
    }
    public function ajouterEtudiant(): Response
    {
      // récupère le manager d'entités
      $entityManager = $this->getDoctrine()->getManager();

      // instanciation d'un objet Etudiant
      $etudiant = new Etudiant();
      $etudiant->setNom('Potter');
      $etudiant->setPrenom('Harry');
      $etudiant->setDateNaiss(new \DateTime(date('1980-07-31')));


      // Indique à Doctrine de persister l'objet
      $entityManager->persist($etudiant);

      // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
      $entityManager->flush();

      // renvoie vers la vue de consultation de l'étudiant en passant l'objet etudiant en paramètre
     return $this->render('etudiant/consulter.html.twig', [
          'etudiant' => $etudiant,]);
    }


    public function consulterEtudiant($idEtudiant){

    		$etudiant = $this->getDoctrine()
            ->getRepository(Etudiant::class)
            ->find($idEtudiant);

    		if (!$etudiant) {
    			throw $this->createNotFoundException(
                'Aucun etudiant trouvé avec le numéro '.$idEtudiant
    			);
    		}

    		//return new Response('Etudiant : '.$etudiant->getNom());
    		return $this->render('etudiant/consulter.html.twig', [
                'etudiant' => $etudiant,]);
    	}








}
