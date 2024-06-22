<?php

namespace App\Controller;

use DateTimeZone;
use App\Entity\Secret;
use App\Entity\Form;
use App\Form\FormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/hash', name: 'app_form')]
    public function index(Request $request): Response
    {
        $hash = $request->query->get('hash', "Nincs URL!");

        return $this->render('form/index.html.twig', [
            'hash' => $hash,
        ]);
    }

    #[Route('/', name: 'create-post')]
    public function createPost(Request $request)
    {
        $post = new Form();
        $form = $this->createForm(FormType::class, $post);
        $form->handleRequest($request);
        $hash = "";

        if ($form->isSubmitted() && $form->isValid()) {

            $secrets = new Secret();
            $secrets->setSecretText($form->getViewData()->getSecretText());
            $expire = $form->getViewData()->getExpiresAt() . " minute";
            $secrets->setExpiresAt(new \DateTime($expire));
            $secrets->setRemainingViews($form->getViewData()->getRemainingViews());
            $secrets->setCreatedAt(new \DateTimeImmutable('now', new DateTimeZone('Europe/Budapest')));
            $secrets->setExpireView(0);
            $randomnum = random_int(8, 12);
            $random = sha1(random_bytes($randomnum));
            $secrets->setHash($random);

            $hash = $secrets->getHash();

            $this->em->persist($secrets);
            $this->em->flush();

            $this->addFlash('message', 'Inserted successfully!');
            return $this->redirectToRoute('app_form', array('hash' => $hash));
        }

        return $this->render('form/form.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
