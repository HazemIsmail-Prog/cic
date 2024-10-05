<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Items') }}
    </h2>
</x-slot>

<div>
    <div class="px-4 sm:px-0 flex items-center justify-between mb-4">
        <a wire:navigate
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            href="{{ route('item.form') }}">New Item</a>

        <x-text-input wire:model.live="search" class="block" placeholder="Search..." type="text" />
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900">
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 items-start gap-2">
                @foreach ($this->items as $item)
                    <div class=" border p-2 rounded-lg">
                        <h2
                            class=" flex items-center justify-between gap-3 font-semibold border-b pb-1 text-xl text-gray-800 leading-tight">
                            <div>{{ $item->name }}</div>
                            <div class=" flex items-center gap-2">
                                <a class="text-sm text-indigo-500" wire:navigate href="{{ route('item.form', $item) }}">
                                    Edit</a>
                                @if (!$item->recipes()->exists())
                                    <button class="text-sm text-red-500" wire:confirm="ARE YOU SURE ?"
                                        wire:click="delete({{ $item }})">Delete</button>
                                @endif
                            </div>

                        </h2>
                        <div class="pt-2">
                            <div class="text-sm flex items-center justify-between">
                                <p>Code</p>
                                <p class=" font-bold">{{ $item->id }}</p>
                            </div>
                            <div class="text-sm flex items-center justify-between">
                                <p>Category</p>
                                <p class=" font-bold">{{ $item->category }}</p>
                            </div>
                            @if ($item->supplier)
                                <div class="text-sm flex items-center justify-between">
                                    <p>Supplier</p>
                                    <p class=" font-bold">{{ $item->supplier }}</p>
                                </div>
                            @endif
                            <div class="text-sm flex items-center justify-between">
                                <p>Cost</p>
                                <p class=" font-bold">{{ number_format($item->cost, 3) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <div class="px-4 sm:px-0 mt-4">{{ $this->items->links(data: ['scrollTo' => false]) }}</div>
</div>
