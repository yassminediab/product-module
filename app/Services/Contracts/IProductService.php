<?php
namespace App\Services\Contracts;

use App\Product;
use App\User;

interface IProductService {

    /**
     * @param array $product_information
     * @param User $user
     * @return Product
     */
    public function store(array $product_information, User $user): Product;

    /**
     * @param array $product_information
     * @param string $id
     * @return void
     */
    public function update(array $product_information, string $id): void;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;

    /**
     * @param string $id
     * @return Product|null
     */
    public function getProduct(string $id): Product | null;

    /**
     * @param string $id
     * @param string $userId
     * @return Product|null
     */
    public function getProductByUserId(string $id, string $userId): Product | null;

    /**
     * @param array $filters
     * @return array
     */
    public function listProducts(array $filters): array;
}
