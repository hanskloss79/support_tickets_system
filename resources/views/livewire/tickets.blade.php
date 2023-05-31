<div>
    <h1 class="text-3xl">Support tickets</h1>
    @foreach ($tickets as $ticket)
        <div class="rounded-1 cursor-pointer border border-1 p-2 my-2 
        {{$active === $ticket->id ? 'text-bg-success':''}}" 
        wire:click="$emit('ticketSelected',{{$ticket->id}})">
            <p class="text-break"> {{$ticket->question}} </p>
        </div>
    @endforeach
</div>
