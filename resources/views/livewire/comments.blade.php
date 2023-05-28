<div class="w-100">
    <h1 class="text-3xl text-center">Komentarze</h1>
    <div>
        @if (session()->has('message'))
        <div class="p-2 text-bg-success text-center rounded-1 w-50">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <section>
        <input type="file" class="form-control w-auto" id="image" wire:change="$emit('fileChosen')">
    </section>

    <form class="d-flex mt-3" wire:submit.prevent="addComment">
        <input type="text" class="form-control rounded-1 me-2 my-2" placeholder="Tutaj wpisz komentarz."
            wire:model.debounce.500ms="newComment">
        <div class="py-2">
            <button type="submit" class="btn btn-primary ">
                Dodaj
            </button>
        </div>
    </form>
    @error('newComment') <p class="text-danger text-xs mb-4">{{ $message }}</p> @enderror

    @foreach ($comments as $comment)
    <div class="rounded-1 border border-1 p-2 my-4">
        <div class="d-flex justify-content-between my-1">
            <div class="d-flex">
                <p class="fw-bold text-lg">{{$comment->creator->name}}</p>
                <p class="mx-3 py-1 text-xs"> {{$comment->created_at->diffForHumans()}}</p>
            </div>
            <i class="fas fa-times text-danger hover:text-primary cursor-pointer"
                wire:click="remove({{$comment->id}})"></i>
        </div>
        <p class="text-break"> {{$comment->body}} </p>
    </div>
    @endforeach
    {{ $comments->links() }}
</div>


