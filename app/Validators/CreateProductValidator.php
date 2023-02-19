<?php
namespace App\Validators;

class CreateProductValidator extends RequestValidator
{
    /**
     * @return array
     */
    public function getRules(): array
    {
        return [
            'name'=>"required",
            'price'=>"required|numeric",
            'product_type_id'=>"required|exists:product_types,id",
        ];
    }

}
