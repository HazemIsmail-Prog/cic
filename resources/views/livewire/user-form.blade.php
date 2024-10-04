<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit="save">
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-5">

                        <!-- Name -->
                        <div class=" col-span-full md:col-span-3">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model="form.name" id="name" class="block mt-1 w-full" type="text"
                                autofocus required autocomplete="new-name" />
                            <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div class="col-span-full md:col-span-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full"
                                type="email" required autocomplete="current-email" />
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                        </div>

                        <!-- Role -->
                        <div class="col-span-full md:col-span-2">
                            <x-input-label for="role" :value="__('Role')" />
                            <x-text-input wire:model="form.role" id="role" class="block mt-1 w-full" type="text"
                                name="role" required autocomplete="current-role" />
                            <x-input-error :messages="$errors->get('form.role')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        @if (!$form->id)
                            <div class="col-span-full md:col-span-2">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                    type="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                            </div>
                        @endif
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
</div>
