<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </h2>
</x-slot>

<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">


            <form wire:submit="save">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-2">

                    <!-- Name -->
                    <div class="col-span-full md:col-span-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model="form.name" id="name" class="block mt-1 w-full" type="text"
                            name="name" required autocomplete="current-name" />
                        <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="col-span-full md:col-span-1">
                        <x-input-label for="category" :value="__('Category')" />
                        <x-select required wire:model="form.category" id="category" class="block mt-1 w-full">
                            <option disabled value="">---</option>
                            @foreach (config('constants.items.categories') as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('form.category')" class="mt-2" />
                    </div>

                    <!-- Production Quantity -->
                    <div class="col-span-full md:col-span-1">
                        <x-input-label for="cost" :value="__('Cost')" />
                        <x-text-input wire:model="form.cost" id="cost" class="block mt-1 w-full" type="number"
                            step="0.001" name="cost" required autocomplete="current-cost" />
                        <x-input-error :messages="$errors->get('form.cost')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="col-span-full md:col-span-1">
                        <x-input-label for="unit" :value="__('Unit')" />
                        <x-select required wire:model="form.unit" id="unit" class="block mt-1 w-full">
                            <option disabled value="">---</option>
                            @foreach (config('constants.items.units') as $unit)
                                <option value="{{ $unit }}">{{ $unit }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('form.unit')" class="mt-2" />
                    </div>

                    <!-- Supplier -->
                    <div class="col-span-full md:col-span-1">
                        <x-input-label for="supplier" :value="__('Supplier')" />
                        <x-select wire:model="form.supplier" id="supplier" class="block mt-1 w-full">
                            <option value="">---</option>
                            @foreach (config('constants.suppliers') as $supplier)
                                <option value="{{ $supplier }}">{{ $supplier }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('form.supplier')" class="mt-2" />
                    </div>

                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button wire:click="cancel" type="button" class="ms-3">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button class="ms-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
