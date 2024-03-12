<x-app-layout>


    {{-- <form wire:submit="save">
        <div class="mt-10 border-2 border-blue-400 rounded-lg xl:mx-14">
            <div class="mt-10 font-bold text-center">Complete your Profile</div>
      
            <div class="p-8">
                <div class="flex flex-col gap-4 xl:flex-row">
                    <input type="text" wire:model="last_name" name="last_name"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Last Name" />
                    <div>
                        @error('last_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" wire:model="first_name" name="first_name"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="First Name" />
                    <div>
                        @error('first_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="text" wire:model="middle_name" name="middle_name"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Middle Name" />
                    <div>
                        @error('middle_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col gap-4 my-6 xl:flex-row">
                    <input type="email" wire:model="email" name="email"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Email" />
                    <input type="text" wire:model="phone" name="phone"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Phone" />
                </div>
                <div class="flex flex-col gap-4 my-6 xl:flex-row">
                    <input type="text" wire:model="aka" name="aka"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="AKA" />
                    <input type="text" wire:model="batch_name" name="batch_name"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Batch Name" aria-atomic="" />
                    <input type="date" wire:model="t_birt" name="t_birth"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="T-Birth" />
                </div>
                <div class="flex flex-col gap-4 xl:flex-row">
                    <input type="text" wire:model="gt" name="gt"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="GT" />
                    <input type="text" wire:model="current_chapter" name="current_chapter"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Current Chapter" />
                    <input type="text" wire:model="root_chapter" name="root_chapter"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Root Chapter" />
                    <input type="text" wire:model="status" name="status"
                        class="block w-full px-3 py-4 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm"
                        placeholder="Status" />
                </div>
                <div class="flex flex-col my-2 xl:gap-4 xl:flex-row">
                    <livewire:addressapi />
                </div>
                <div class="my-6">
                    <textarea type="text" wire:model="address" id="text" cols="30" rows="4" name="address"
                        class="w-full h-20 p-5 mb-10 font-semibold text-gray-300 border rounded-md resize-none border-slate-300">Complete Address</textarea>

                    <label class="w-full max-w-xs form-control">

                        <input wire:model='photo' type="file" name="photo"
                            class="w-full max-w-xs file-input file-input-bordered" />

                    </label>
                </div>
                <div class="mt-8 text-center">
                    <button type="submit"
                        class="px-8 py-5 text-sm font-semibold text-white bg-blue-700 rounded-lg cursor-pointer">Save</button>
                </div>
            </div>
        </div>
    </form> --}}

    <livewire:brods />
</x-app-layout>
