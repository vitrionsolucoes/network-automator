<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-2">{{ $ticket->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $ticket->created_at->format('M d, Y \a\t h:i A') }}</p>

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 font-medium">Status:</span>
                            <span
                                class="text-sm font-medium 
                                    {{ $ticket->status == 'open' ? 'text-red-600' : ($ticket->status == 'ongoing' ? 'text-blue-600' : 'text-green-600') }}">
                                {{ $ticket->status == 'open' ? 'Aberto' : ($ticket->status == 'ongoing' ? 'Em andamento' : 'Fechado') }}
                            </span>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">{{ __('Prioridade:') }}</span>
                            <span
                                class="text-sm font-medium {{ $ticket->priority == 1 ? 'text-red-600' : ($ticket->priority == 2 ? 'text-yellow-600' : 'text-green-600') }}">
                                @switch($ticket->priority)
                                @case(1)
                                {{ __('Alto') }}
                                @break
                                @case(2)
                                {{ __('Média') }}
                                @break
                                @case(3)
                                {{ __('Baixa') }}
                                @break
                                @default
                                {{ ucfirst($ticket->priority) }}
                                @endswitch
                            </span>
                        </div>


                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Solicitante:</span>
                            <span class="text-sm font-medium">{{ $ticket->requester->name }}</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            @if ($ticket->device)
                                <span class="text-sm text-gray-600 font-medium">Equipamento:</span>
                                <a class="hover:text-gray-900 hover:underline" href="/device/{{ $ticket->device->id }}">
                                    <span class="text-sm font-medium">{{ $ticket->device->hostname }}</span>
                                </a>
                            @else
                                <span class="text-sm text-gray-600 font-medium">Sem equipamento associado ao ticket.</span>
                            @endif
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Atendente:</span>
                            <span
                                class="text-sm font-medium">{{ $ticket->attendant ? $ticket->attendant->name : '-' }}</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Tempo gasto:</span>
                            <span
                                class="text-sm font-medium {{ $ticket->time_spent >= $ticket->time_estimate ? 'text-red-500' : 'text-green-500' }}">
                                {{ date('H:i', strtotime('today') + $ticket->time_spent * 60) }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Estimativa:</span>
                            <span class="text-sm font-medium">
                                {{ date('H:i', strtotime('today') + $ticket->time_estimate * 60) }}
                            </span>
                        </div>

                        @php
                        $status = $ticket->status;
                        $closeDate = strtotime($ticket->close_date_estimate);
                        $now = time();
                        $color = '';

                        if ($status == 'closed') {
                        $endedDate = strtotime($ticket->ended_at);
                        $diff = $closeDate - $endedDate;
                        } else {
                        $diff = $closeDate - $now;
                        }

                        if ($diff > 43200) { // more than 12 hours
                        $color = 'green';
                        } elseif ($diff > 0) { // less than 12 hours, but not delayed
                        $color = 'orange';
                        } else { // delayed
                        $color = 'red';
                        }
                        @endphp

                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-gray-600 font-medium">Prazo:</span>
                            <span class="text-sm font-medium text-{{$color}}-500">
                                {{ $ticket->close_date_estimate }}
                            </span>
                        </div>

                        <div class="mt-8">
                            <h4 class="text-lg font-medium mb-2">Descrição</h4>
                            <p class="text-gray-700">{{ $ticket->description }}</p>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="/ticket/{{$ticket->id}}/edit">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Atualizar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-2">Comentários</h3>
                        @if ($ticket->comments()->count() > 0)
                        <div class="space-y-4">
                            @foreach ($ticket->comments as $comment)
                            <div class="flex items-center space-x-2">
                                <div>
                                    <div class="text-sm font-medium">{{ $comment->user->name }}</div>
                                    <div class="text-sm text-gray-600">
                                        {{ $comment->created_at->locale('pt_BR')->diffForHumans() }}</div>
                                    <div class="text-gray-700">{{ $comment->body }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-gray-500">Ticket sem comentários.</p>
                        @endif
                    </div>
                </div>
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form action="{{ route('comment.store', $ticket->id) }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="body" :value="__('Novo Comentário')" />
                            <textarea id="body" name="body" rows="4"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>

                            @error('comment')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Adicionar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>