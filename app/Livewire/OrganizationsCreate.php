<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Livewire\Component;

class OrganizationsCreate extends Component
{
    public $organization;
    public OrganizationForm $form;
    public $feedback = '';

    public function mount(Organization $organization)
    {
        $this->form->setOrganization($organization);
        $this->organization = $organization;
    }

    public function create()
    {
        $organization = $this->form->create();
        $this->feedback = 'This has been Create successfully';
        // quand il y aura une modal ça disparait
        return redirect(route('organization.edit', $organization));
    }

    public function render()
    {
        return view('livewire.organizations-create');
    }
}
