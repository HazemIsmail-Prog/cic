<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Recipes') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a wire:navigate
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    href="{{ route('recipe.form') }}">New Recipe</a>

                <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 items-start gap-2">
                    @foreach ($this->recipes as $recipe)
                        <div class=" border p-2 rounded-lg mt-3">
                            <h2
                                class=" flex items-center justify-between font-semibold border-b pb-1 text-xl text-gray-800 leading-tight">
                                <div>{{ $recipe->name }}</div>
                                <div class=" flex items-center gap-2">
                                    <a class="text-sm text-indigo-500" wire:navigate href="{{ route('recipe.form', $recipe) }}"> Edit</a>
                                    <button  class="text-sm text-red-500" wire:click="delete({{$recipe}})">Delete</button>
                                </div>

                            </h2>
                            <div class="py-2">
                                <div class="text-sm flex items-center justify-between">
                                    <p>Code</p>
                                    <p class=" font-bold">{{ $recipe->code }}</p>
                                </div>
                                <div class="text-sm flex items-center justify-between">
                                    <p>Category</p>
                                    <p class=" font-bold">{{ $recipe->category }}</p>
                                </div>
                                <div class="text-sm flex items-center justify-between">
                                    <p>Production Quantity</p>
                                    <p class=" font-bold">{{ $recipe->production_quantity }}</p>
                                </div>
                            </div>

                            <div class="p-2 bg-gray-100 rounded-lg">
                                @foreach ($recipe->items as $item)
                                    <div class="text-xs flex items-center justify-between">
                                        <p>{{ $item->name }}</p>
                                        <div class=" flex items-center gap-1">
                                            <p class=" font-bold">{{ $item->pivot->quantity }}</p>
                                            <p>{{ $item->unit }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
