<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todos os Tickets') }}
        </h2>
    </x-slot>

    <!-- Inicializa o fundo branco sob a tela cinza -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Inicializa o fundo da tabela -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Barra de Busca e Filtro -->
                <div class="p-2 flex justify-center items-center mb-4">
                    <form method="get" action="{{ route('ticket.index') }}"
                        class="inline-flex justify-between items-center">
                        <div class="flex items-center flex-grow pl-6">
                            <label for="search" class="mr-2 font-medium text-gray-900">Busca:</label>
                            <div class="flex-grow">
                                <input type="text" name="search" id="search"
                                    class="border border-gray-400 rounded-md py-2 px-3 w-full">
                            </div>
                        </div>

                        <div class="pr-6 flex items-center">
                            <label for="filter" class="pl-6 mr-2 font-medium text-gray-900">Filtro:</label>
                            <select name="filter" id="filter" class="border border-gray-400 rounded-md py-2 px-3"
                                onchange="this.form.submit()">
                                <option value="all">Todos</option>
                                <option value="open">Abertos</option>
                                <option value="ongoing">Em andamento</option>
                                <option value="closed">Fechados</option>
                            </select>
                        </div>

                        <div class="m-2">
                            <x-secondary-button type="submit" class="cursor-pointer">
                                {{ __('Buscar') }}
                            </x-secondary-button>
                        </div>
                    </form>
                    <div class="m-2">
                        <a href="{{ route('ticket.index') }}">
                            <x-secondary-button type="reset" class="cursor-pointer">
                                {{ __('Limpar') }}
                            </x-secondary-button>

                        </a>
                    </div>
                </div>

                <!-- Inicio da Tabela -->
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">

                        <!-- Head -->
                        <x-table-head 
                            :columns="['Título', 'Solicitante', 'Status', 'Idade']"
                            :button-text="'Novo Ticket'" 
                            :button-link="'ticket/create'" 
                            />

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($tickets as $ticket)
                            <tr  class="hover:bg-gray-50 font-medium text-gray-700">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{{ $ticket->title }}</div>
                                        <div class="text-gray-400">{{ $ticket->description }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-700">
                                        {{ $ticket->requester->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold {{ $ticket->status == 'open' ? 'bg-red-50 text-red-600' : ($ticket->status == 'ongoing' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600') }}">
                                        <span
                                            class="h-1.5 w-1.5 rounded-full {{ $ticket->status == 'open' ? 'bg-red-600' : ($ticket->status == 'ongoing' ? 'bg-blue-600' : 'bg-green-600') }}"></span>
                                        {{ trans('messages.' . $ticket->status) }}
                                    </span>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}
                                </td>

                                <td class="flex justify-end gap-4 pr-6 pt-6">
                                <x-controller-actions 
                                    editLink="{{ route('ticket.edit', $ticket->id) }}"
                                    showLink="{{ route('ticket.show', $ticket->id) }}"/>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-grey-300 rounded p-2 pl-5 m-auto">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>