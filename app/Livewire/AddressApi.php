<?php

namespace App\Livewire;

use Livewire\Component;

class AddressApi extends Component
{

    public $jsonData;
    public $regions = [];
    public $provinces = [];

    public $barangays = [];

    public $municipalities = [];

    public $selectedRegion;
    public $selectedProvince;

    public $selectedMunicipality;

    

    public function mount()
    {
        // Load JSON data
    $jsonString = file_get_contents(storage_path('app/public/address-api.json'));
    $this->jsonData = json_decode($jsonString, true);

    // Initialize regions
    $this->regions = $this->jsonData;

    // Initialize provinces, municipalities, and barangays
    if ($this->selectedRegion) {
        $this->provinces = $this->getProvinceList($this->selectedRegion);
    }

    if ($this->selectedProvince) {
        $this->municipalities = $this->getCityList($this->selectedRegion, $this->selectedProvince);
    }

    if ($this->selectedMunicipality) {
        $this->barangays = $this->getBarangayList($this->selectedRegion, $this->selectedProvince, $this->selectedMunicipality);
    }
    }
    

    public function getProvinceList($regionId)
    {
        return array_keys($this->jsonData[$regionId]['province_list']);
    }

    public function getCityList($regionId, $provinceName)
    {
      
        $municipalities = $this->jsonData[$regionId]['province_list'][$provinceName]['municipality_list'];
    // Debugging statement

        dd($municipalities);
        return array_keys($municipalities);
    }
    public function getBarangayList($regionId, $provinceName, $cityName)
    {
        return $this->jsonData[$regionId]['province_list'][$provinceName]['municipality_list'][$cityName]['barangay_list'];
    }

    public function updatedSelectedRegion($value)
    {
        if (array_key_exists($value, $this->jsonData)) {
            $this->provinces = $this->getProvinceList($value);
            $this->selectedProvince = null; // Reset selected province
            $this->municipalities = [];
            $this->barangays = [];
        }
    }

    public function updatedSelectedProvince($value)
    {
       
        // if (array_key_exists($this->selectedRegion, $this->jsonData) && array_key_exists($value, $this->jsonData[$this->selectedRegion]['province_list'])) {
        //     $this->municipalities = $this->getCityList($this->selectedRegion, $value);
        //     $this->selectedMunicipality = null; // Reset selected municipality
        //     $this->barangays = []; // Reset barangays
        // }

        if (array_key_exists($this->selectedRegion, $this->jsonData) && array_key_exists($value, $this->jsonData[$this->selectedRegion]['province_list'])) {
            $this->municipalities = $this->getCityList($this->selectedRegion, $value);
            logger('Municipalities:', $this->municipalities); // Debugging statement
            $this->selectedMunicipality = null; // Reset selected municipality
            $this->barangays = []; // Reset barangays
        }
    }

    public function updatedSelectedMunicipality($value)
    {
        if (array_key_exists($this->selectedRegion, $this->jsonData) && array_key_exists($this->selectedProvince, $this->jsonData[$this->selectedRegion]['province_list']) && array_key_exists($value, $this->jsonData[$this->selectedRegion]['province_list'][$this->selectedProvince]['municipality_list'])) {
            $this->barangays = $this->getBarangayList($this->selectedRegion, $this->selectedProvince, $value);
        }
    }

  
    public function regionSelected()
    {
        $this->provinces = array_keys($this->jsonData[$this->selectedRegion]['province_list']);
        $this->selectedProvince = null; // Reset selected province
    }

    public function render()
    {
        return view('livewire.addressapi');
    }
}
