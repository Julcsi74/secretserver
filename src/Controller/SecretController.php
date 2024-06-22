<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Entity\Secret;
use App\Repository\SecretRepository;

class SecretController extends AbstractFOSRestController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/secret', methods: ['POST'])]
    public function create(Request $request, SecretRepository $secretRepository): Response
    {
        $data = $request->request->all();
        $secrets = new Secret();
        $secrets->setSecretText($data['secret']);
        $expire = $data['expiresat'] . " minute";
        $secrets->setExpiresAt(new \DateTime($expire));
        $secrets->setRemainingViews($data['remainingviews']);
        $secrets->setCreatedAt(new \DateTimeImmutable('now', new DateTimeZone('Europe/Budapest')));
        $secrets->setExpireView(0);
        $randomnum = random_int(8, 12);
        $random = sha1(random_bytes($randomnum));
        $secrets->setHash($random);

        $this->em->persist($secrets);
        $this->em->flush();
        $this->addFlash('message', 'Successful operation!');

        return $this->handleView($this->view($secrets, $statusCode = 200, $headers = [200, 'Successful operation!']));
    }

    #[Route('/secret/{hash}.{_format}', methods: 'GET')]
    public function getAddress(string $hash, SecretRepository $secretRepository)
    {

        $item = $secretRepository->findBy(['hash' => $hash]);

        if ($item) {
            $item[0]->setExpireView($item[0]->getExpireView() + 1);

            $this->em->persist($item[0]);
            $this->em->flush();
        }

        if (empty($item)) {
            throw $this->createNotFoundException('Secret not found.');
        }

        if (new \DateTimeImmutable('now', new DateTimeZone('Europe/Budapest')) > $item[0]->getExpiresAt()) {
            throw $this->createNotFoundException('The secret is expired!');
        }

        if ($item[0]->getExpireView() > $item[0]->getRemainingViews()) {
            throw $this->createNotFoundException('The secret has been viewed too many times!');
        }

        return $this->handleView($this->view($item));
    }
}
