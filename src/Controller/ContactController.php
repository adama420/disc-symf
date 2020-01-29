<?php


namespace App\Controller;


use App\Form\ContactType;
use App\Modele\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/product/contact", name="product_contact")
     */
    public function contact(Request $request, MailerInterface $mailer)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                dump($contact);
                $this->addFlash('succes','Votre message a bien été envoyé');

                $email = (new Email())
                    ->from('contact@monsite.com')
                    ->to('admin@monsite.com')
                    ->subject($contact->getName().'a fait une demande')
                    ->text($contact->getMessage())
                    ->html('<h1>Email:'.$contact->getMail().'</h1>');

                $mailer->send($email);

            }

        return $this->render('Products/productcontact.html.twig',[
            'form'=>$form->createView(),
        ]);
    }
}