<?php
namespace App\Validators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ContractValidator;

abstract class RequestValidator
{

    /**
     * abstract function to get rules for all Validators
     * @return array
     */
    abstract public function getRules(): array;

    /**
     * @param array $data
     * @return ContractValidator
     */
    public function validate(array $data): ContractValidator
    {
        return Validator::make($data, $this->getRules());
    }
}
