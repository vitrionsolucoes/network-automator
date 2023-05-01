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
                <x-index-search-bar formAction="{{ route('device.vendor.index') }}"
                    resetUrl="{{ route('device.vendor.index') }}" />

                <!-- Inicio da Tabela -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                        <!-- Head -->
                        <x-table-head :columns="['Nome', 'Quantidade de Dispositivos']" button-text="Novo Grupo"
                            button-link="group/create" />

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($deviceGroups as $deviceGroup)
                            <tr class="hover:bg-gray-50 font-medium text-gray-700">
                                <td class="px-6 py-4">
                                                {{ $deviceGroup->name }}
                                </td>

                                <td class="px-6 py-4">
                                        {{ $deviceGroup->device()->count() }}
                                </td>

                                <!-- Table Cell for Item Status Styling  -->
                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                    <x-controller-actions 
                                        editLink="{{ route('device.group.edit', $deviceGroup->id) }}"
                                        deleteLink="{{ route('device.group.destroy', $deviceGroup->id) }}"
                                        showLink="{{ route('device.group.show', $deviceGroup->id) }}" />
                                </td>
                                <!--  -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>