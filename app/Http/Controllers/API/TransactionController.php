<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @OA\Info(
     *     title="My API",
     *     version="1.0.0",
     *     description="API documentation for personal accounting system"
     * )
     *
     * @OA\Tag(
     *     name="Transactions",
     *     description="API Endpoints for Transactions"
     * )
     */

    public function __construct(private TransactionService $transactionService) {}

    /**
     * @OA\Get(
     *     path="/api/transactions",
     *     tags={"Transactions"},
     *     summary="Get all transactions of authorized user",
     *     description="Returns a list of transactions",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index() {
        return $this->transactionService->getTransactionsForUser(auth()->id());
    }

    /**
     * @OA\Post(
     *     path="/api/transaction/store",
     *     tags={"Create Transaction"},
     *     summary="Create new transaction",
     *     description="Returns a list of transactions",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function store(TransactionRequest $request) {
        return $this->transactionService->createTransaction($request->validated(), auth()->id());
    }
}
