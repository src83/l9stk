<?php

namespace App\Http\Controllers\Cabinet\Example\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\Example\EntityRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EntitiesController extends Controller
{
    public function __construct() {}

    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'data' => ['examples'],
        ]);
    }

    public function store(EntityRequest $request): JsonResponse
    {
        $clientId = $request->validated('client_id');

        $data = [
            'client_id' => trim($clientId),
            'status' => 'success',
        ];
        // $message = $this->messageRepository->create($data);

        return response()->json([
            'status' => 'post_created',
        ], 201);
    }
}
