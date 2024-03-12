<div>
    <div class="relative m-10 bg-white border-4 rounded-lg shadow">



        <div class="p-6 space-y-6">
            <form wire:submit="save" enctype="multipart/form-data">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Last
                            Name</label>
                        <input type="text" name="last_name" id="last-name" wire:model='last_name'
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Last Name">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                        <input type="text" name="first_name" id="first-name" wire:model='first_name'
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="First Name">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="middle-name" class="block mb-2 text-sm font-medium text-gray-900">Middle
                            Name</label>
                        <input type="text" name="middle_name" id="middle-name" wire:model='middle_name'
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Middle Name">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Photo</label>


                        <input type="file" name="photo" id="photo" wire:model='photo' {{-- value="{{ asset('storage/default.jpg') }}" --}}
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                    </div>

                </div>

            </form>
        </div>

        <div class="p-6 border-t border-gray-200 rounded-b">
            <button wire:click.prevent='save'
                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="submit">Save all</button>
        </div>

    </div>
</div>
