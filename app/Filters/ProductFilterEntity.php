<?php

namespace App\Filters;

class ProductFilterEntity
{
    /**
     * @var string|null
     */
    protected string | null $name;

    protected $userId;

    /**
     * @param $filters
     */
    public function __construct($filters) {
        $this->setName($filters['name'] ?? null);
        $this->setUserId($filters['userId'] ?? null);
    }

    /**
     * @param $name
     * @return void
     */
    public function setName($name): void {
        $this->name = $name;
    }

    /**
     * @param $userId
     * @return void
     */
    public function setUserId($userId): void {
        $this->userId = $userId;
    }

    /**
     * @return string|null
     */
    public function getName(): string | null {
        return $this->name;
    }


    public function getUserId() {
        return $this->userId;
    }

    /**
     * @return bool
     */
    public function hasName(): bool {
        return !empty($this->name);
    }

    /**
     * @return bool
     */
    public function hasUserId(): bool {
        return !empty($this->userId);
    }
}

