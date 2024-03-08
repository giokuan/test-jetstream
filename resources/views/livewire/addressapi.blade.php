<div>
    <h2>Select a Region:</h2>
    <select id="region_select" wire:model="selectedRegion" wire:change="regionSelected">
        <option value="">Select Region</option>
        @foreach ($regions as $regionId => $region)
            <option value="{{ $regionId }}">{{ $region['region_name'] ?? 'Region name not available' }}</option>
        @endforeach
    </select>

    @if (!empty($provinces))
        <h2>Select a Province:</h2>
        <select id="province_select" wire:model="selectedProvince">
            <option value="">Select Province</option>
            @foreach ($provinces as $provinceId => $province)
                <option value="{{ $provinceId }}">{{ $province }}</option>
            @endforeach
        </select>
    @endif

    @if (!empty($municipalities))
        <h2>Select a municipality:</h2>
        <select id="municipality_select" wire:model="selectedMunicipality">
            <option value="">Select Municipality</option>
            @foreach ($municipalities as $municipalityId => $municipality)
                <option value="{{ $municipalityId }}">{{ $municipality }}</option>
            @endforeach
        </select>
    @endif
</div>
