<?php

namespace App\Controller;

use App\Entity\SchoolClass;
use App\Entity\Schools;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SchoolClassController extends AbstractController
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * ClassController constructor.
     */
    public function __construct() {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getName();
            },
        ];
        $this->serializer = new Serializer([new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)], [new JsonEncoder()]);
    }

        /**
     * @Route("/schoolClass", name="schoolClass")
     */
    public function classAction(): Response
    {
        //Récupération des données en BDD
        $schoolClasses = $this->getDoctrine()
            ->getRepository(SchoolClass::class)
            ->findAll();

        //Sérialization
        $jsonContent = $this->serializer->serialize($schoolClasses, 'json');

        //Création de la JsonResponse
        //return JsonResponse::fromJsonString($jsonContent);

        $response = new Response();
        $response->setContent($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
