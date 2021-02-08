<?php

namespace App\Controller;

use App\Entity\Schools;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SchoolController extends AbstractController
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * EcoleController constructor.
     */
    public function __construct() {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    /**
     * @Route("/school", name="school")
     */
    public function ecoleAction(): Response
    {
        //Récupération des données en BDD
        $ecoles = $this->getDoctrine()
            ->getRepository(Schools::class)
            ->findAll();

        //Sérialization
        $jsonContent = $this->serializer->serialize($ecoles, 'json');

        //Création de la JsonResponse
        //return JsonResponse::fromJsonString($jsonContent);

        $response = new Response();
        $response->setContent($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/classe", name="classe")
     */
    public function classeAction(): JsonResponse
    {
        $response = new JsonResponse();
        $response->setData("Method API en cours de DEV");

        return $response;
    }
}
