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
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';
        $this->apiKey = config('services.gemini.key');
    }

    /**
     * Generate a daily affirmation based on recent mood.
     */
    public function getDailyAffirmation($moodAvg)
    {
        $prompt = "Generate a short, calming, and uplifting daily affirmation for someone who has been feeling a mood level of {$moodAvg} (on a scale of 1-5, where 1 is sad and 5 is happy). Keep it under 20 words. Do not use quotes.";

        return $this->callApi($prompt, 'You are stronger than you know.');
    }

    /**
     * Reframe a negative thought.
     */
    public function reframeThought($thought)
    {
        $prompt = "You are Whispr, a compassionate mental health companion. The user will share a thought. Your goal is to validate their feelings first, then gently offer a 'cognitive reframing'—a positive or constructive perspective on their situation. Keep it short (under 3 sentences), warm, and human-like. Thought: '{$thought}'";

        return $this->callApi($prompt, 'I hear you. Remember that you are doing your best, and it is okay to have these feelings.');
    }

    /**
     * Generate a creative anonymous username.
     */
    public function generateUsername()
    {
        $prompt = "Generate a single, creative, anonymous username consisting of a positive adjective and a cute animal (e.g., 'BravePanda', 'CalmKoala'). No spaces, no special characters. Output ONLY the username.";

        $adjectives = ['Calm', 'Serene', 'Gentle', 'Quiet', 'Peaceful', 'Happy', 'Brave'];
        $nouns = ['River', 'Mountain', 'Sky', 'Breeze', 'Ocean', 'Tree', 'Star'];
        $fallback = $adjectives[array_rand($adjectives)] . $nouns[array_rand($nouns)] . rand(10, 99);

        return $this->callApi($prompt, $fallback);
    }

    protected function callApi($content, $default = 'Thinking...')
    {
        if (empty($this->apiKey)) {
            Log::warning('AI Service: GEMINI_API_KEY is not set.');
            return $default;
        }

        try {
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
                $text = $response->json('candidates.0.content.parts.0.text');
                return $text ? trim($text) : $default;
            }

            Log::error('Gemini API Error: ' . $response->status() . ' - ' . $response->body());
            return $default;
        } catch (\Exception $e) {
            Log::error('AI Service Exception: ' . $e->getMessage());
            return $default;
        }
    }
}
