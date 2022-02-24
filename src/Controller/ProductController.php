<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ProductController
{
    public function product(): Response
    {
        $product = random_int(0, 100);

        return new Response(
            '<html><body>PRoduct: '.$product.'</body></html>'
        );
    }
}