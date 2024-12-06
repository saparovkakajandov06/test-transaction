<?php


namespace App\Services;


use App\Repositories\TransactionRepository;

class TransactionService
{
    public function __construct(private TransactionRepository $repository) {}

    public function getTransactionsForUser(int $userId) {
        return $this->repository->findByUserId($userId);
    }

    public function createTransaction(array $data, int $userId) {
        return $this->repository->create($data + ['user_id' => $userId]);
    }
}
