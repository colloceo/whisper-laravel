<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent';
        $this->apiKey = env('GEMINI_API_KEY');
    }

    /**
     * Generate a daily affirmation based on recent mood.
     */
    public function getDailyAffirmation($moodAvg)
    {
        $prompt = "Generate a short, calming, and uplifting daily affirmation for someone who has been feeling a mood level of {$moodAvg} (on a scale of 1-5, where 1 is sad and 5 is happy). Keep it under 20 words. Do not use quotes.";

        return $this->callApi($prompt);
    }

    /**
     * Reframe a negative thought.
     */
    public function reframeThought($thought)
    {
        $prompt = "You are Whispr, a compassionate mental health companion. The user will share a thought. Your goal is to validate their feelings first, then gently offer a 'cognitive reframing'—a positive or constructive perspective on their situation. Keep it short (under 3 sentences), warm, and human-like. Thought: '{$thought}'";

        return $this->callApi($prompt);
    }

    /**
     * Generate a creative anonymous username.
     */
    public function generateUsername()
    {
        $prompt = "Generate a single, creative, anonymous username consisting of a positive adjective and a cute animal (e.g., 'Brave Panda', 'Calm Koala'). Do not use special characters or numbers. Output ONLY the username.";
        return $this->callApi($prompt) ?? 'Anonymous Friend';
    }

    protected function callApi($content)
    {
        try {
            // Construct the Gemini API payload
            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $content]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 100,
                ]
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}?key={$this->apiKey}", $payload);

            if ($response->successful()) {
                // Extract text from Gemini response structure
                return $response->json('candidates.0.content.parts.0.text') ?? 'Stay strong, you are doing great.';
            }

            Log::error('Gemini API Error: ' . $response->body());
            return 'You are stronger than you know.';
        } catch (\Exception $e) {
            Log::error('AI Service Exception: ' . $e->getMessage());
            return 'Peace comes from within.';
        }
    }
}
