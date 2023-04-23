<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo ticket') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('ticket.store') }}">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Título')" />

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrição')" />
                            <textarea id="description" name="description"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                rows="6" required></textarea>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="priority" :value="__('Prioridade')" />

                            <select id="priority" name="priority"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1">Alta</option>
                                <option value="2">Media</option>
                                <option value="3">Baixa</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="requester_id" :value="__('Solicitante')" />

                            <select id="requester_id" name="requester_id"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <label for="time_estimate">Estimativa de tempo (minutos)</label>
                            <!-- populate the input field with the location's current time_estimate -->
                            <input type="number" id="time_estimate" name="time_estimate" min="0"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="0" required>
                        </div>

                        <input type="datetime-local" id="close_date_estimate" name="close_date_estimate" value="2017-06-01" />

                        <div class="mt-4">
                            <x-input-label for="attendant_id" :value="__('Atendente')" />
                            <select id="attendant_id" name="attendant_id"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />

                            <select id="status" name="status"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="open">Aberto</option>
                                <option value="ongoing">Em andamento</option>
                                <option value="closed">Fechado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Abrir</button>
            </form>
        </div>
    </div>
</x-app-layout>