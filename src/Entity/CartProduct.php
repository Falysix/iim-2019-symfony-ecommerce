<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartProductRepository")
 */
class CartProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCart(): ?int
    {
        return $this->cart;
    }

    public function setCart(int $cart): self
    {
        $this->cart = $cart;

        return $this;
    }
}
