<x-app-layout>
<x-slot name="header">
        <div class='flex inline'>
            <div class="mr-6">
                <x-nav-link :href="route('device.index')" :active="request()->routeIs('device.index')">
                    {{ __('Dispositivo') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.group.index')" :active="request()->routeIs('device.group.index')">
                    {{ __('Gráficos') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.vendor.index')" :active="request()->routeIs('device.vendor.index')">
                    {{ __('Automações') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.model.index')" :active="request()->routeIs('device.model.index')">
                    {{ __('CLI') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white">
                        <div class="flex items-center justify-between">
                            <div class="flex-grow">
                                <h3 class="text-lg font-medium mb-2">{{ $device->name }}</h3>
                                <p class="text-sm text-gray-500 mb-4">{{ $device->hostname }}</p>
                            </div>
                            <div class="mb-6 rounded-lg border-gray-200 flex justify-between items-center">
                                <a href="/device/{{ $device->id}}/edit">
                                    <button
                                        class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                        Editar
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 font-medium">Status:</span>
                            <span
                                class="text-sm font-semibold gap-1 rounded-full {{ $device->status == 'inactive' ? 'bg-red-50 text-red-600' : 'bg-green-50 text-green-600' }}">
                                {{ trans('messages.' . $device->status) }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Localidade:</span>
                            <a href="/location/{{$device->location->id}}">
                                <span class="text-sm font-medium hover:underline hover:text-gray-900">
                                    {{ $device->location->name }}
                                </span>
                            </a>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">IPv4:</span>
                            <span class="text-sm font-medium">{{ $device->ipv4_address }}</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">IPv6:</span>
                            <span class="text-sm font-medium">{{ $device->ipv6_address }}</span>
                        </div>
                    </div>
                </div>

                <!--  Ticket portion of the page -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white">
                        <div class="mb-6 rounded-lg border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-medium mb-2">Tickets</h3>
                            <a href="/ticket/create">
                                <button
                                    class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Novo Ticket
                                </button>
                            </a>
                        </div>
                        @if ($device->tickets()->count() > 0)
                        <div class="space-y-4">
                            @foreach ($device->tickets()->paginate(3) as $ticket)
                            <div class="flex items-center justify-between">
                                <div>
                                    <a href="/ticket/{{$ticket->id}}">
                                        <div class="text-sm font-medium hover:underline hover:text-gray-900">
                                            {{ $ticket->title}}</div>
                                    </a>
                                    <div class="text-sm text-gray-600">
                                        {{ $ticket->created_at->locale('pt_BR')->diffForHumans() }}</div>
                                    <div class="text-gray-700">{{ $ticket->body }}</div>
                                </div>
                                <div class="ml-auto">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold {{ $ticket->status == 'open' ? 'bg-red-50 text-red-600' : ($ticket->status == 'ongoing' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600') }}">
                                        <span
                                            class="h-1.5 w-1.5 rounded-full {{ $ticket->status == 'open' ? 'bg-red-600' : ($ticket->status == 'ongoing' ? 'bg-blue-600' : 'bg-green-600') }}"></span>
                                        {{ trans('messages.' . $ticket->status) }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $device->tickets()->paginate(3)->links() }}
                        </div>
                        @else
                        <p class="text-gray-500">Equipamento sem tickets.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <span class="m-10 block" style="height: 350px; width: 100%;">
                    Reservado para alguma outra coisa
                </span>
            </div>
        </div>
    </div>
</x-app-layout>