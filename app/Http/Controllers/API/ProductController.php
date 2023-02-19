<?php

namespace App\Http\Controllers\API;

use App\Jobs\SendProductMail;
use App\Services\Contracts\IProductService;
use App\Validators\CreateProductValidator;
use App\Validators\UpdateProductValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends ApiController
{
    /**
     * variable for dependency injection
     * @var IProductService
     */
    protected IProductService $productService;

    /**
     * depend on product service
     * ProductController constructor.
     * @param IProductService $productService
     */
    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response {
        $products = $this->productService->listProducts($request->all());
        return $this->respondAccepted('', $products);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response {
        $product = $this->productService->getProduct($id);
        if($product == null)
            return $this->respondNotFound('Product Not Found');

        return $this->respondAccepted('', $product);
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response {
        $productValidator = (new CreateProductValidator())->validate($request->all());
        if($productValidator->fails())
            return $this->respondNotAcceptable('Errors in inputs', $productValidator->messages()->toArray());

        $product = $this->productService->store($productValidator->validated(),$request->user());
        return $this->respondAccepted('Product is created successfully', $product);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, string $id): Response {
        $productValidator = (new UpdateProductValidator())->validate(array_merge($request->all(), ['id' => $id]));
        if($productValidator->fails())
            return $this->respondNotAcceptable('Errors in inputs', $productValidator->messages()->toArray());

        $product = $this->productService->getProductByUserId($id, $request->user()->id);
        if(!$product)
            return $this->respondNotFound('Product Not Found');


        $this->productService->update($productValidator->validated(),$id);
        return $this->respondAccepted('Product is updated successfully');
    }

    /**
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function destroy(Request $request, string $id): Response {
        $product = $this->productService->getProductByUserId($id, $request->user()->id);
        if(!$product)
            return $this->respondNotFound('Product Not Found');

        $this->productService->delete($id);
        return $this->respondAccepted('Product is deleted successfully');
    }
}
