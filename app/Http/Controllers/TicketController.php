<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\Ticket;
use App\Models\Comment;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $filter = $request->get('filter');
    
        $tickets = Ticket::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'LIKE', '%'.$query.'%')
                    ->orWhere('description', 'LIKE', '%'.$query.'%');
            })
            ->when($filter && $filter != 'all', function ($queryBuilder) use ($filter) {
                if ($filter == 'open') {
                    $queryBuilder->where('status', 'open');
                } elseif ($filter == 'ongoing') {
                    $queryBuilder->where('status', 'ongoing');
                } elseif ($filter == 'closed') {
                    $queryBuilder->where('status', 'closed');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    
        return view('ticket.index', compact('tickets'));
    }
    
    
    
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }
    

    public function create()
    {
        $users = User::all();
        $devices = Device::all();
        return view('ticket.create', compact('users', 'devices'));
    }

    public function store(Request $request)
    {
        Ticket::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'requester_id' => $request->input('requester_id'),
            'attendant_id' => $request->input('attendant_id'),
            'status' => $request->input('status'),
            'time_estimate' => $request->input('time_estimate'),
            'close_date_estimate' => $request->input('close_date_estimate'),
            'device_id' => $request->input('device_id'),
        ]);

        return redirect()->route('ticket.index');
    }

    public function edit(Ticket $ticket)
    {
        if ($ticket->status == "closed" ){
            return redirect()->route('ticket.index')->with('error', 'Tickets fechados não podem ser atualizados.');
        }

        $users = User::all();
        $devices = Device::all();
        return view('ticket.edit', compact('ticket', 'users', 'devices'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->status == "closed" ){
            return redirect()->route('ticket.index')->with('error', 'Tickets fechados não podem ser atualizados.');
        }
        
        if ($request->status == "closed"){
            $request->merge(['ended_at' => now()]);
        }

        if($request->time_spent < 0){
            return redirect()->route('ticket.show', ['ticket' => $ticket])->with('error', 'É proibido adicionar um valor negativo.');
        }

        $current_time_spent = $ticket->time_spent; // get current time_spent value
        $new_time_spent = $request->time_spent; // get new time_spent value from request
        $total_time_spent = $current_time_spent + $new_time_spent; // calculate total time spent
    
        $ticket->update(array_merge($request->all(), ['time_spent' => $total_time_spent])); // update ticket with new time_spent value added to current value
        return redirect()->route('ticket.show', ['ticket' => $ticket])->with('success', 'Ticket atualizado com sucesso.');
    }
}