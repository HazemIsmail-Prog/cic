<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div 
                class="p-6 text-gray-900"
                x-init="
                    Echo.channel('chat')
                        .listen('Example', (event)=>{
                            console.log(event)
                        })
                "
            >
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</x-app-layout>
