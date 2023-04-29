<x-app-layout>
    <x-slot name="header">
        <x-devices-index-header />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-devices-index-search-bar formAction="{{ route('device.group.index') }}"
                    resetUrl="{{ route('device.group.index') }}">
                    <input type="text" name="search" id="search"
                        class="border border-gray-400 rounded-md py-2 px-3 w-full">
                </x-devices-index-search-bar>

                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <x-table-head :columns="['Nome', 'Quantidade de Dispositivos']" :button-text="'Novo Grupo'"
                            :button-link="'group/create'" />

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
                                
                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                    <x-devices-actions edit-link="{{ route('device.group.edit', $deviceGroup->id) }}"
                                        edit-tooltip="Edit Item"
                                        delete-link="{{ route('device.group.destroy', $deviceGroup->id) }}"
                                        delete-tooltip="Delete Item"
                                        show-link="{{ route('device.group.show', $deviceGroup->id) }}" />
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