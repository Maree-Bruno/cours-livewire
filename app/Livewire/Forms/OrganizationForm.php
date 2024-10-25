<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use App\Models\Organization;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OrganizationForm extends Form
{
    public Organization $organization;
    #[Validate]
    public $name;
    #[Validate]
    public $email;
    #[Validate]
    public $phone;
    #[Validate]
    public $address;
    #[Validate]
    public $city;
    #[Validate]
    public $country;
    #[Validate]
    public $region;
    #[Validate]
    public $postal_code;
    #[Validate]

    public function setOrganization(Organization $organization)
    {
        $this->organization = $organization;
        $this->name = $organization->name;
        $this->email = $organization->email;
        $this->phone = $organization->phone;
        $this->address = $organization->address;
        $this->city = $organization->city;
        $this->country = $organization->country;
        $this->region = $organization->region;
        $this->postal_code = $organization->postal_code;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => ['email', 'max:50', 'nullable'],
            'phone' => ['max:50','nullable'],
            'address' => ['max:150','nullable'],
            'city' => ['max:50','nullable'],
            'region' => ['max:50','nullable'],
            'country' => ['max:2','nullable'],
            'postal_code' => ['max:25','nullable'],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->organization->update($this->except('organization'));

    }
    public function create()
    {
        $this->validate();
        return Account::whereName('Acme Corporation')->first()->organizations()->create($this->all());
    }
}
