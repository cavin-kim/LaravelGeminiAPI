<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleMessage(Request $request)
    {
        $userMessage = $request->input('message');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . env('GEMINI_API_KEY'), [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $userMessage]
                    ]
                ]
            ]
        ]);

        // Check for errors or invalid response
        if ($response->failed()) {
            return response()->json([
                'message' => 'Failed to connect to Gemini API. Status code: ' . $response->status(),
                'error' => $response->body(),
            ]);
        }

        $chatbotResponse = $response->json();
        \Log::info('Gemini API Response:', $chatbotResponse);

        $responseText = $chatbotResponse['candidates'][0]['content']['parts'][0]['text'] ?? 'No response from Gemini API';
        return response()->json([
            'message' => $responseText,
        ]);
    }

    public function show()
    {
        return view('gemini');
    }
}
