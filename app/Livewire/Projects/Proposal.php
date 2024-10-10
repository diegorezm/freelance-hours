<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Proposal extends Component
{
    public Project $project;
    public $proposal_count = 5;


    public function increment()
    {
        $this->proposal_count += 5;
    }

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()
            ->orderByDesc('hours')
            ->paginate($this->proposal_count);
    }

    #[Computed()]
    public function lastProposalTime()
    {
        return $this->project->proposals()
            ->latest()
            ->first()
            ->created_at
            ->diffForHumans();
    }

    public function render()
    {
        return view('livewire.projects.proposal');
    }
}
