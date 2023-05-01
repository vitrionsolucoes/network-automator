<x-app-layout>
    <x-slot name="header">
        <x-devices-index-header />
    </x-slot>

    <!-- Inicializa o fundo branco sob a tela cinza -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Inicializa o fundo da tabela -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Barra de Busca e Filtro -->
                <x-index-search-bar 
                    formAction="{{ route('device.index') }}" 
                    resetUrl="{{ route('device.index') }}"
                    :showFilter="true" />

                <!-- Inicio da Tabela -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                        <!-- Head -->
                        <x-table-head 
                            :columns="['Hostname', 'IP', 'Grupo', 'Modelo', 'Status']"
                            button-text="Novo Equipamento" 
                            button-link="device/create" />

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($devices as $device)
                            <tr class="hover:bg-gray-50 font-medium text-gray-700">
                                <td class="px-6 py-4">
                                    {{ $device->name }}
                                    <div class="text-sm text-gray-400">
                                        {{ $device->hostname }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{ $device->ipv4_address }}
                                    <div class="text-sm text-gray-400">
                                        {{ $device->ipv6_address }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{ $device->deviceGroup->name}}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $device->deviceModel->name}}

                                </td>

                                <!-- Table Cell for Item Status Styling  -->
                                <td class="px-6 py-4">
                                    <x-index-status-cell :status="$device->status" />
                                </td>
                                <!--  -->

                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                    <x-controller-actions 
                                        editLink="{{ route('device.edit', $device->id) }}"
                                        deleteLink="{{ route('device.destroy', $device->id) }}"
                                        showLink="{{ route('device.show', $device->id) }}" />
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