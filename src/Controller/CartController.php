<?php

namespace App\Controller;

use App\Classe\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/my-basket", name="basket")
     */
    public function index(Cart $cart): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull()
        ]);
    }

    /**
     * @Route("/basket/add/{id}", name="add_to_basket")
     */
    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);
        return $this->redirectToRoute('basket');
    }

    /**
     * @Route("/basket/delete/{id}", name="delete_my_product")
     */
    public function remove(Cart $cart, $id): Response
    {
        $cart->delete($id);
        return $this->redirectToRoute('basket');
    }

    /**
     * @Route("/basket/decrease/{id}", name="decrease_to_cart")
     */
    public function decrease(Cart $cart, $id)
    {
        $cart->decrease($id);
        return $this->redirectToRoute('basket');
    }

}