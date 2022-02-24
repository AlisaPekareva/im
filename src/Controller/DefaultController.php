<?php

namespace App\Controller;


use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * @throws \Exception
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $cr = $em->getRepository('App:Category');
        $pd = $em->getRepository('App:Product');
        $categories = $cr->findAll();
        $products = $pd->findAll();

        return $this->render('default/index.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function category(int $id, EntityManagerInterface $em)
    {
        $category = $em->getRepository('App:Category')->find($id);

        return $this->render('default/category.html.twig', [
            'category' => $category,
        ]);
    }


    public function product(int $id, EntityManagerInterface $em)
    {
        $product = $em->getRepository('App:Product')->find($id);

        return $this->render('default/product.html.twig', [
            'product' => $product,
        ]);
    }


}