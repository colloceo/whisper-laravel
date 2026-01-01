<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\JournalEntry as JournalModel;
use App\Services\AiService;
use Illuminate\Support\Facades\Auth;

class JournalEntry extends Component
{
    public $content;
    public $entries;
    public $isProcessing = false;
    public $aiResponse = null;

    protected $rules = [
        'content' => 'required|min:5|max:5000',
    ];

    public function mount()
    {
        $this->refreshEntries();
    }

    public function refreshEntries()
    {
        $this->entries = Auth::user()->journalEntries()->latest()->take(5)->get();
    }

    public function setPrompt($prompt)
    {
        $this->content = $prompt . " ";
    }

    public function submitEntry(AiService $aiService)
    {
        $this->validate();
        $this->isProcessing = true;
        $this->aiResponse = null; // Reset previous response

        // 1. Save user entry immediately
        $entry = Auth::user()->journalEntries()->create([
            'content' => $this->content,
            'is_private' => true,
            'mood_score' => null // Could link to mood tracking later
        ]);

        // 2. Call AI Service
        try {
            $reflection = $aiService->reframeThought($this->content);

            // 3. Update entry with AI response
            $entry->update(['ai_response' => $reflection]);

            // 4. Set local property for UI feedback
            $this->aiResponse = $reflection;
            session()->flash('message', 'Journal saved and analyzed.');

        } catch (\Exception $e) {
            session()->flash('error', 'Entry saved, but AI could not respond right now.');
        }

        $this->content = '';
        $this->isProcessing = false;
        $this->refreshEntries();
    }

    public function render()
    {
        return view('livewire.journal-entry');
    }
}
