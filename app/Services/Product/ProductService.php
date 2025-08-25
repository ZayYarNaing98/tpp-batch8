<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function status($id)
    {
        $product = $this->productRepository->show($id);

        $product->status = $product->status === 1 ? 0 : 1;

        $product->save();
    }
}