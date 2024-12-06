<?php


namespace App\Repositories;


use App\Models\Transaction;

class TransactionRepository
{
    public function findByUserId(int $userId) {
        return Transaction::where('user_id', $userId)->get();
    }

    public function create(array $data) {
        return Transaction::create($data);
    }
}
