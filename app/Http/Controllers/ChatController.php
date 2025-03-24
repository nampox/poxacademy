<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    public function handleChat(Request $request): JsonResponse
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['error' => 'Vui lòng nhập tin nhắn'], 400);
        }

        return response()->json([
            'message' => $message,
            'reply' => "Bot: Tôi đã nhận tin nhắn '$message'."
        ]);
    }
}
