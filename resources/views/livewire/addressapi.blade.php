<!-- resources/views/livewire/address-dropdown.blade.php -->

<div>
    <select wire:model="selectedRegion" wire:change="setSelectedRegion($event.target.value)">
        <option value="">Select Region</option>
        @foreach ($regions as $regionKey => $region)
            <option value="{{ $regionKey }}">{{ $region['region_name'] }}</option>
        @endforeach
    </select>

    <select wire:model="selectedProvince" wire:change="setSelectedProvince($event.target.value)">
        <option value="">Select Province</option>
        @foreach ($provinces as $province => $data)
            <option value="{{ $province }}">{{ $province }}</option>
        @endforeach
    </select>

    <select wire:model="selectedMunicipality" wire:change="setSelectedMunicipality($event.target.value)">
        <option value="">Select Municipality</option>
        @if ($selectedRegion && $selectedProvince)
            @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'] as $municipality => $data)
                <option value="{{ $municipality }}">{{ $municipality }}</option>
            @endforeach
        @endif
    </select>

    <select wire:model="selectedBarangay">
        <option value="">Select Barangay</option>
        @if ($selectedRegion && $selectedProvince && $selectedMunicipality)
            @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'][$selectedMunicipality]['barangay_list'] as $barangay)
                <option value="{{ $barangay }}">{{ $barangay }}</option>
            @endforeach
        @endif
    </select>
</div>
