<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{   
    public $comments = [];
    public $newComment = '';
    
    public function mount()
    {
        $this->comments = Comment::latest()->get();
    }

    public function updated()
    {
        $this->validate([
            'newComment' => 'max:255'
        ]);
    }
    
    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:255'
        ]);
        $createdComment = Comment::create([
            'body'              => $this->newComment, 
            'user_id' => 1
        ]);
        $createdComment->save();
        $this->newComment = '';
        $this->comments = Comment::all()->sortDesc();
        session()->flash('message','Utworzono notatkę !!!');

    }
    
    public function render()
    {
        return view('livewire.comments');
    }
}
