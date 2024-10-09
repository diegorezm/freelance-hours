<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public $proposal_count = 0;
    public function render()
    {
        return view('livewire.projects.index');
    }

    #[Computed()]
    public function projects()
    {
        return Project::query()->inRandomOrder()->get();
    }
}
