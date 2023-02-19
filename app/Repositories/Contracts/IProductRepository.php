<?php
namespace App\Repositories\Contracts;

use App\Filters\ProductFilterEntity;
use App\Product;
use App\User;

interface IProductRepository {

    /**
     * @param array $product_information
     * @return Product
     */
    public function store(array $product_information): Product;

    /**
     * @param array $product_information
     * @param $id
     * @return void
     */
    public function update(array $product_information, string $id): void;

    /**
     * @param $id
     * @return void
     */
    public function delete(string$id): void;

    /**
     * @param $id
     * @return Product|null
     */
    public function findProductById(string $id): Product | null;

    /**
     * @param string $id
     * @param string $userId
     * @return Product|null
     */
    public function findProductByIdAndUser(string $id, string $userId): Product | null;

    /**
     * @param ProductFilterEntity $productFilterEntity
     * @return array
     */
    public function filterProducts(ProductFilterEntity $productFilterEntity): array;
}
