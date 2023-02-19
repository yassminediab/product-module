<?php
namespace App\Services;

use App\Enums\ProductStatusesEnum;
use App\Filters\ProductFilterEntity;
use App\Jobs\SendProductMail;
use App\Product;
use App\Repositories\Contracts\IProductRepository;
use App\Services\Contracts\IProductService;
use App\User;
use function Symfony\Component\Translation\t;

class ProductService implements IProductService {

    /**
     * variable for dependency injection
     * @var IProductRepository
     */
    protected IProductRepository $productRepository;


    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $product_information
     * @param User $user
     * @return Product
     */
    public function store(array $product_information, User $user): Product {
        $product_information['user_id'] = $user->id;
        $product_information['status'] = ProductStatusesEnum::Pending;
        $product = $this->productRepository->store($product_information);
        SendProductMail::dispatch($user);
        return $product;
    }

    /**
     * @param array $product_information
     * @param string $id
     * @return void
     */
    public function update(array $product_information, string $id): void {
        $this->productRepository->update($product_information, $id);
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        $this->productRepository->delete($id);
    }

    /**
     * @param string $id
     * @return Product| null
     */
    public function getProduct(string $id): Product | null
    {
        return $this->productRepository->findProductById($id);
    }

    /**
     * @param string $id
     * @param string $userId
     * @return Product|null
     */
    public function getProductByUserId(string $id, string $userId): Product | null
    {
        return $this->productRepository->findProductByIdAndUser($id, $userId);
    }

    /**
     * @param array $filters
     * @return array
     */
    public function listProducts(array $filters): array
    {
        $productFilterEntity = new ProductFilterEntity($filters);
        return $this->productRepository->filterProducts($productFilterEntity);
    }
}
