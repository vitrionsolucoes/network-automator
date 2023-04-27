<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Ticket') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- component -->
                    <!-- This is an example component -->
                    <div class="max-w-2xl mx-auto bg-white p-16">
                        <!-- change the form action to use the update method instead of the store method -->
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- add a hidden input field to specify that the form is using the PUT method -->
                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="title">Título</label>
                                <!-- populate the input field with the location's current title -->
                                <input type="text" id="title" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $ticket->title }}" required>
                            </div>

                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="description">Descrição</label>
                                <!-- populate the input field with the location's current description -->
                                <textarea type="text" id="description" name="description" rows="6"
                                    class="g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $ticket->description }}" required>{{ $ticket->description }}</textarea>
                            </div>

                            <div class="lg:col-span-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                <label for="time_spent">Tempo Gasto (minutos)</label>
                                <!-- populate the input field with the location's current time_spent -->
                                <input type="number" id="time_spent" name="time_spent" min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="0" required>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="priority" :value="__('Prioridade')" />
                                <select id="priority" name="priority"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>
                                    <option value="1" {{ $ticket->priority == '1' ? 'selected' : '' }}>Alta</option>
                                    <option value="2" {{ $ticket->priority == '2' ? 'selected' : '' }}>Média</option>
                                    <option value="3" {{ $ticket->priority == '3' ? 'selected' : '' }}>Baixa</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="requester_id" :value="__('Solicitante')" />
                                <select id="requester_id" name="requester_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $user->id == $ticket->requester_id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="device_id" :value="__('Equipamento')" />
                                <select id="device_id" name="device_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($devices as $device)
                                    <option value="{{ $device->id }}"
                                        {{ $device->id == $ticket->device_id ? 'selected' : '' }}>
                                        {{ $device->hostname }}
                                    </option>
                                    @endforeach
                                <option value=""></option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="attendant_id" :value="__('Atendente')" />
                                <select id="attendant_id" name="attendant_id"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $ticket->attendant_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Aberto
                                    </option>
                                    <option value="ongoing" {{ $ticket->status == 'ongoing' ? 'selected' : '' }}>Em
                                        andamento</option>
                                    <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Fechado
                                    </option>
                                </select>

                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>