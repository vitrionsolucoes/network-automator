<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Localidades') }}
        </h2>
    </x-slot>

    <!-- Inicializa o fundo branco sob a tela cinza -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Inicializa o fundo da tabela -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Barra de Busca e Filtro -->
                <x-index-search-bar 
                    formAction="{{ route('location.index') }}" 
                    resetUrl="{{ route('location.index') }}"
                    showFilter="true" />

                <!-- Inicio da Tabela -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                        <!-- Head -->
                        <x-table-head 
                            :columns="['Nome', 'Cidade', 'Status', 'Equipamentos']"
                            button-text="Nova Localidade" 
                            button-link="location/create" />

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($locations as $location)
                            <tr class="hover:bg-gray-50 font-medium text-gray-700">
                                <td class="px-6 py-4">
                                    {{ $location->name }}

                                    <div class="text-sm text-gray-400">
                                        {{ $location->city }} - {{ $location->state }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    {{ $location->address_line }}, {{ $location->number }}
                                </td>

                                <!-- Table Cell for Item Status Styling  -->
                                <td class="px-6 py-4">
                                    <x-index-status-cell :status="$location->status" />
                                </td>
                                <!--  -->

                                <td class="px-6 py-4">
                                    {{ $location->device()->count() }}
                                </td>

                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                    <x-controller-actions 
                                        editLink="{{ route('location.edit', $location->id) }}"
                                        deleteLink="{{ route('location.destroy', $location->id) }}"
                                        showLink="{{ route('location.show', $location->id) }}" />
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