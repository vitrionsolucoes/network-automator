<x-app-layout>
    <x-slot name="header">
        <x-devices-index-header />
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form action="{{ route('device.update', $device->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="title">Título</label>
                                <input type="text" id="title" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $device->name }}" required>
                            </div>
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="hostname">Hostname</label>
                                <input type="text" id="hostname" name="hostname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $device->hostname }}">
                            </div>

                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="ipv4_address">Endereço IPv4</label>
                                <input type="text" id="ipv4_address" name="ipv4_address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $device->ipv4_address }}">
                            </div>
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="ipv6_address">Endereço IPv6</label>
                                <input type="text" id="ipv6_address" name="ipv6_address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $device->ipv6_address }}">
                            </div>
                            <div class="mt-4">
                                <x-input-label for="snmp_version" :value="__('Versão SNMP')" />
                                <select id="snmp_version" name="snmp_version"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="1">Versão 1</option>
                                    <option value="2">Versão 2c</option>
                                </select>
                            </div>
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="snmp_community">Comunidade SNMP</label>
                                <input type="text" id="snmp_community" name="snmp_community"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $device->snmp_community }}">
                            </div>
                            <div class="mt-4">
                                <x-input-label for="device_group_id" :value="__('Grupo')" />
                                <select id="device_group_id" name="device_group_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($deviceGroups as $deviceGroup)
                                    <option value="{{ $deviceGroup->id }}">{{ $deviceGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="device_model_id" :value="__('Modelo')" />
                                <select id="device_model_id" name="device_model_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($deviceModels as $deviceModel)
                                    <option value="{{ $deviceModel->id }}">{{ $deviceModel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="location_id" :value="__('Local')" />
                                <select id="location_id" name="location_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="active">Ativo</option>
                                    <option value="inactive">Inativo</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>