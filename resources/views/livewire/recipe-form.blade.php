<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $title }}
    </h2>
</x-slot>

<div x-data="recipeForm()">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 md:p-6 text-gray-900">
            <form wire:submit="save">
                <div class="grid grid-cols-2 md:grid-cols-7 items-end gap-2">

                    <!-- Name -->
                    <div class="col-span-full md:col-span-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:model="form.name" id="name" class="block mt-1 w-full" type="text"
                            name="name" required autocomplete="current-name" />
                        <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="col-span-full md:col-span-2">
                        <x-input-label for="category" :value="__('Category')" />
                        <x-select required wire:model="form.category" id="category" class="block mt-1 w-full">
                            <option disabled value="">---</option>
                            @foreach (config('constants.recipes.categories') as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('form.category')" class="mt-2" />
                    </div>

                    <!-- Production Quantity -->
                    <div class="col-span-1 md:col-span-1">
                        <x-input-label for="production_quantity" :value="__('Production Quantity')" />
                        <x-text-input wire:model="form.production_quantity" id="production_quantity"
                            class="block mt-1 w-full" type="number" name="production_quantity" required
                            autocomplete="current-production_quantity" />
                        <x-input-error :messages="$errors->get('form.production_quantity')" class="mt-2" />
                    </div>

                    <!-- Unit -->
                    <div class="col-span-1 md:col-span-1">
                        <x-input-label for="unit" :value="__('Unit')" />
                        <x-select required wire:model="form.unit" id="unit" class="block mt-1 w-full">
                            <option disabled value="">---</option>
                            @foreach (config('constants.recipes.units') as $unit)
                                <option value="{{ $unit }}">{{ $unit }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('form.unit')" class="mt-2" />
                    </div>

                    <!-- Ingredients -->
                    <div class="col-span-full">
                        <x-input-label for="Ingredients" :value="__('Ingredients')" />
                        <x-input-error :messages="$errors->get('form.ingredients')" class="mt-2" />


                        <div class="p-2 md:p-5 border rounded-lg">
                            <div class="md:flex items-start gap-3">

                                <div class="md:w-2/3 space-y-1">
                                    <template x-for="(ingredient, index) in selectedIngredients" :key="index">
                                        <div class="border p-3 rounded-lg flex items-center justify-between gap-3">
                                            <!-- Delete Button -->
                                            <button type="button" @click="removeIngredient(index)"
                                                class="text-red-600 hover:text-red-800 text-xs">
                                                &#x2716; <!-- This is a cross symbol (X) for the delete icon -->
                                            </button>
                                            <div class=" flex-1">
                                                <div x-text="ingredient.name"></div>
                                                <div class="text-xs font-extralight" x-text="ingredient.unit"></div>
                                            </div>
                                            <x-text-input placeholder="Quantity" x-model="ingredient.quantity"
                                                type="number" step="0.01" required />

                                        </div>
                                    </template>
                                </div>

                                <!-- Item Search & Select -->
                                <div class="border md:w-1/3 mt-2 md:mt-0 p-2 rounded-lg shadow-xl">
                                    <!-- Search Input -->
                                    <x-text-input x-model="searchQuery" placeholder="Search..."
                                        class="block mt-1 w-full" type="text" />

                                    <div class=" h-96 overflow-y-auto p-2 divide-y">
                                        <template x-for="item in filteredItems" :key="item.id">
                                            <div class="flex items-center hover:bg-indigo-100 ps-2">
                                                <input type="checkbox" @change="toggleItem(item)"
                                                    x-bind:checked="selectedIngredients.some(ingredient => ingredient.id === item
                                                        .id)"
                                                    x-bind:id="'check-' + item.id"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                                <label :for="'check-' + item.id"
                                                    class="ms-2 font-medium text-gray-900 w-full cursor-pointer  py-1 ">
                                                    <div class="font-bold" x-text="item.name"></div>
                                                    <div class="text-xs font-extralight" x-text="item.unit"></div>
                                                </label>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<script>
    function recipeForm() {
        return {
            searchQuery: '',
            selectedIngredients: @entangle('form.ingredients'),
            items: @json($this->items), // Assuming this is your items array from the backend

            // Filter items based on search query
            get filteredItems() {
                if (this.searchQuery === '') {
                    return this.items;
                }
                return this.items.filter(item => item.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
            },

            // Toggle ingredient selection
            toggleItem(item) {
                let found = this.selectedIngredients.find(ingredient => ingredient.id === item.id);
                if (found) {
                    this.selectedIngredients = this.selectedIngredients.filter(ingredient => ingredient.id !== item.id);
                } else {
                    this.selectedIngredients.push({
                        id: item.id,
                        name: item.name,
                        unit: item.unit,
                        quantity: ''
                    });
                }
            },

            // Remove ingredient by index
            removeIngredient(index) {
                this.selectedIngredients.splice(index, 1);
            },
        };
    }
</script>
