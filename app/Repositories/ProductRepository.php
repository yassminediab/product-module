<?php
namespace App\Repositories;

use App\Filters\ProductFilterEntity;
use App\Product;
use App\Repositories\Contracts\IProductRepository;

class ProductRepository implements IProductRepository {

    /**
     * @param array $productInformation
     * @return Product
     */
    public function store(array $productInformation): Product {
        return Product::create($productInformation);
    }

    /**
     * @param array $product_information
     * @param string $id
     * @return void
     */
    public function update(array $product_information, string $id): void
    {
        Product::where('id', $id)->update($product_information);
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        Product::where('id', $id)->delete();
    }

    /**
     * @param string $id
     * @return Product|null
     */
    public function findProductById(string $id): Product | null
    {
        return Product::with(['user','productType'])->find($id);
    }

    /**
     * @param string $id
     * @param string $userId
     * @return Product|null
     */
    public function findProductByIdAndUser(string $id, string $userId): Product|null
    {
        return Product::where('id', $id)->where('user_id' , $userId)->first();
    }

    /**
     * @param ProductFilterEntity $productFilterEntity
     * @return array
     */
    public function filterProducts(ProductFilterEntity $productFilterEntity): array
    {
        $products = Product::with(['user', 'productType']);
        if($productFilterEntity->hasName()) {
            $products->where('name','like' ,'%'.$productFilterEntity->getName().'%');
        }

        if($productFilterEntity->hasUserId()) {
            $products->where('user_id',$productFilterEntity->getUserId());
        }
        return $products->latest()->get()->toArray();
    }
}
