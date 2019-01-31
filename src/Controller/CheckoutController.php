<?php

namespace App\Controller;

use App\Entity\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CheckoutController extends AbstractController
{

    /**
     * @Route("/payment", name="checkout_payment", methods={"POST"})
     */
    public function payment(Request $request, SessionInterface $session)
    {

        $objectManager = $this->getDoctrine()->getManager();
        $cart = new Cart();
        $objectManager->persist($cart);
        $objectManager->flush();
        $session->set('cart', $cartId = $cart->getId());

        return new JsonResponse([
            'result'  => "ok",
            'message' => "paiement validé",
        ]);
    }

    /**
     * @Route("/checkout", name="checkout", methods={"GET"})
     */
    public function checkout(SessionInterface $session)
    {

        return $this->render('checkout/payment.html.twig');

    }

}
