<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Proposal extends Component
{
    public Project $project;
    public $proposal_count = 10;

    public function render()
    {
        return view('livewire.projects.proposal');
    }

    public function increment()
    {
        $this->proposal_count += 10;
    }
}
