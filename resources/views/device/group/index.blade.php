<x-app-layout>
    <x-slot name="header">
        <div class='flex inline'>
            <div class="mr-6">
                <x-nav-link :href="route('device.index')" :active="request()->routeIs('device.index')">
                    {{ __('Dispositivos') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.group.index')" :active="request()->routeIs('device.group.index')">
                    {{ __('Grupos') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.vendor.index')" :active="request()->routeIs('device.vendor.index')">
                    {{ __('Fabricantes') }}
                </x-nav-link>
            </div>
            <div class="mr-6">
                <x-nav-link :href="route('device.model.index')" :active="request()->routeIs('device.model.index')">
                    {{ __('Modelos') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-2 flex justify-center items-center mb-4">
                    <form method="get" action="{{ route('device.group.index') }}"
                        class="inline-flex justify-between items-center">
                        <div class="flex items-center flex-grow pl-6">
                            <label for="search" class="mr-2 font-medium text-gray-900">Busca:</label>
                            <div class="flex-grow">
                                <input type="text" name="search" id="search"
                                    class="border border-gray-400 rounded-md py-2 px-3 w-full">
                            </div>
                        </div>

                        <div class="m-2">
                            <x-secondary-button type="submit" class="cursor-pointer">
                                {{ __('Buscar') }}
                            </x-secondary-button>
                        </div>
                    </form>
                    <div class="m-2">
                        <a href="{{ route('device.group.index') }}">
                            <x-secondary-button type="reset" class="cursor-pointer">
                                {{ __('Limpar') }}
                            </x-secondary-button>

                        </a>
                    </div>
                </div>

                <!-- component -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nome</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantidade de Dispositivos
                                </th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-right">
                                    <a href="group/create">
                                        <button
                                            class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Novo Grupo
                                        </button>
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($deviceGroups as $deviceGroup)
                            <tr class="hover:bg-gray-50">
                                <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">
                                            <span>
                                                {{ $deviceGroup->name }}
                                            </span>
                                        </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-700">
                                        {{ $deviceGroup->device()->count() }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-4">
                                        <a x-data="{ tooltip: 'Edit' }" href="group/{{ $deviceGroup->id }}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('device.group.destroy', $deviceGroup->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a x-data="{ tooltip: 'Delete' }" href="group/{{ $deviceGroup->id }}"
                                                type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                    x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </form>
                                        <a href="group/{{ $deviceGroup->id }}">
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>