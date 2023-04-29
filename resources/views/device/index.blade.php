<x-app-layout>
    <x-slot name="header">
        <x-devices-index-header />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-devices-index-search-bar formAction="{{ route('device.index') }}"
                    resetUrl="{{ route('device.index') }}" :showFilter="true">
                    <input type="text" name="search" id="search"
                        class="border border-gray-400 rounded-md py-2 px-3 w-full">
                </x-devices-index-search-bar>

                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <x-table-head 
                            :columns="['Hostname', 'IP', 'Grupo', 'Modelo', 'Status']"
                            :button-text="'Novo Equipamento'" 
                            :button-link="'device/create'" 
                            />

                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($devices as $device)
                            <tr class="hover:bg-gray-50 font-medium text-gray-700">
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div>
                                            <span>
                                                {{ $device->name }}
                                            </span>
                                        </div>
                                        <div class="text-gray-400">
                                            <span>
                                                {{ $device->hostname }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        <div>
                                            <span>
                                                {{ $device->ipv4_address }}
                                            </span>
                                        </div>
                                        <div class="text-gray-400">
                                            <span>
                                                {{ $device->ipv6_address }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        <span>
                                            {{ $device->deviceGroup->name}}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <div>
                                        <span>
                                            {{ $device->deviceModel->name}}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold {{ $device->status == 'inactive' ? 'bg-red-50 text-red-600' : 'bg-green-50 text-green-600' }}">
                                        <span
                                            class="h-1.5 w-1.5 rounded-full {{ $device->status == 'inactive' ? 'bg-red-600' : 'bg-green-600' }}"></span>
                                        {{ trans('messages.' . $device->status) }}
                                    </span>
                                </td>
                                
                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                <x-devices-actions edit-link="{{ route('device.edit', $device->id) }}"
                                    edit-tooltip="Edit Item" delete-link="{{ route('device.destroy', $device->id) }}"
                                    delete-tooltip="Delete Item" show-link="{{ route('device.show', $device->id) }}" />
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