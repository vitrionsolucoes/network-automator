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
                <x-index-search-bar formAction="{{ route('device.model.index') }}"
                    resetUrl="{{ route('device.model.index') }}" />

                <!-- Inicio da Tabela -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                        <!-- Head -->
                        <x-table-head 
                            :columns="['Modelo', 'Quantidade de Equipamentos']" 
                            button-text="Novo Modelo"
                            button-link="model/create" />

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($deviceModels as $deviceModel)
                            <tr class="hover:bg-gray-50 font-medium text-gray-700">
                                <td class="px-6 py-4">
                                    {{ $deviceModel->name }}
                                    <div class="text-sm text-gray-400">
                                        {{ $deviceModel->deviceVendor->name}}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{ $deviceModel->device()->count() }}
                                </td>

                                <!-- Table Cell for Item Status Styling  -->
                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                    <x-controller-actions editLink="{{ route('device.model.edit', $deviceModel->id) }}"
                                        deleteLink="{{ route('device.model.destroy', $deviceModel->id) }}"
                                        showLink="{{ route('device.model.show', $deviceModel->id) }}" />
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