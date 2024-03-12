<!-- resources/views/livewire/address-dropdown.blade.php -->

<div class="flex flex-col w-full xl:gap-4 ">
    <div class="flex flex-col w-full my-4 xl:gap-4 xl:flex-row">
        <select wire:model="selectedRegion" wire:change="setSelectedRegion($event.target.value) " name="selectedRegion"
            class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
            <option value="">Select Region</option>
            @foreach ($regions as $regionKey => $region)
                <option value="{{ $regionKey }}">{{ $region['region_name'] }}</option>
            @endforeach
        </select>

        {{-- <select name="select" id="select" class="block w-1/2 px-3 py-4 font-semibold text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
        <option  class="font-semibold text-slate-300">Please Select</option>
      </select> --}}

        <select wire:model="selectedProvince" wire:change="setSelectedProvince($event.target.value)"
            name="selectedProvince"
            class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
            <option value="">Select Province</option>
            @foreach ($provinces as $province => $data)
                <option value="{{ $province }}">{{ $province }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex flex-col w-full gap-4 xl:flex-row">
        <select wire:model="selectedMunicipality" wire:change="setSelectedMunicipality($event.target.value)"
            name="selectedMunicipality"
            class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
            <option value="">Select Municipality</option>
            @if ($selectedRegion && $selectedProvince)
                @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'] as $municipality => $data)
                    <option value="{{ $municipality }}">{{ $municipality }}</option>
                @endforeach
            @endif
        </select>

        <select wire:model="selectedBarangay" name="selectedBarangay"
            class="w-full px-3 py-4 text-gray-500 bg-white border rounded-md shadow-sm border-slate-300 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
            <option value="">Select Barangay</option>
            @if ($selectedRegion && $selectedProvince && $selectedMunicipality)
                @foreach ($regions[$selectedRegion]['province_list'][$selectedProvince]['municipality_list'][$selectedMunicipality]['barangay_list'] as $barangay)
                    <option value="{{ $barangay }}">{{ $barangay }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
