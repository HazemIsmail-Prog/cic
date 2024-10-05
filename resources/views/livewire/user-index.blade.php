<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users') }}
    </h2>
</x-slot>


<div>
    <div class="px-4 sm:px-0 flex items-center justify-between mb-4">

        <a wire:navigate
            class="inline-flex users-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            href="{{ route('user.form') }}">New User</a>
        <x-text-input wire:model.live="search" class="block" placeholder="Search..." type="text" />

    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-4 text-gray-900">

            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 users-start gap-2">
                @foreach ($this->users as $user)
                    <div class=" border p-2 rounded-lg">
                        <h2
                            class=" flex users-center justify-between gap-3 font-semibold border-b pb-1 text-xl text-gray-800 leading-tight">
                            <div>{{ $user->name }}</div>
                            <div class=" flex items-center gap-2">
                                <a class="text-sm text-indigo-500" wire:navigate href="{{ route('user.form', $user) }}">
                                    Edit</a>
                                @if ($user->id != auth()->id())
                                    <button class="text-sm text-red-500" wire:confirm="ARE YOU SURE ?"
                                        wire:click="delete({{ $user }})">Delete</button>
                                @endif
                            </div>

                        </h2>
                        <div class="pt-2">
                            <div class="text-sm flex users-center justify-between">
                                <p>Email</p>
                                <p class=" font-bold">{{ $user->email }}</p>
                            </div>
                            <div class="text-sm flex users-center justify-between">
                                <p>Role</p>
                                <p class=" font-bold">{{ $user->role }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="px-4 sm:px-0 mt-4">{{ $this->users->links(data: ['scrollTo' => false]) }}</div>
</div>
