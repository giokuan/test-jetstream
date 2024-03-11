<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class AddressApi extends Component
{   public $regions;
    public $selectedRegion;
    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;

    public function mount()
    {
        // Load JSON data
        $json = Storage::disk('public')->get('address-api.json');
        $this->regions = json_decode($json, true);
    }

    public function render()
    {
        return view('livewire.addressapi', [
            'provinces' => $this->getProvinces(),
        ]);
    }

    public function setSelectedRegion($value)
    {
        $this->selectedRegion = $value;
        $this->selectedProvince = null;
        $this->selectedMunicipality = null;
        $this->selectedBarangay = null;
    }

    public function setSelectedProvince($value)
    {
        $this->selectedProvince = $value;
        $this->selectedMunicipality = null;
        $this->selectedBarangay = null;
    }

    public function setSelectedMunicipality($value)
    {
        $this->selectedMunicipality = $value;
        $this->selectedBarangay = null;
    }

    public function getProvinces()
    {
        if (!$this->selectedRegion || !isset($this->regions[$this->selectedRegion]['province_list'])) {
            return [];
        }

        return $this->regions[$this->selectedRegion]['province_list'];
    }
}
