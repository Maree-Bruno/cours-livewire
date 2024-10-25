<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{
    use WithPagination;

    public $account;
    public $search;

    public function mount()
    {
        $this->account = Account::whereName('Acme Corporation')->first();


    }
    public function highlightText($text, $search)
    {
        if (!$search) {
            return $text;
        }

        return preg_replace(
            '/(' . preg_quote($search, '/') . ')/i',
            '<span class="highlight">$1</span>',
            $text
        );
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Computed]
    public function organizations()
    {
        return $this->account
            ->organizations()
            ->filter(['search'=> $this->search])
            ->orderBy('name')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.organizations-table');
    }
}
