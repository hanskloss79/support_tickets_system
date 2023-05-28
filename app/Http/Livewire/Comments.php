<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
//use Livewire\WithFileUploads;

class Comments extends Component
{   
    use WithPagination;
    //use WithFileUploads;
    
    //public $comments = [];
    public $newComment = '';
    protected $paginationTheme = 'bootstrap';
    //public $image;


    public function mount()
    {
        //$this->comments = Comment::paginate(5);
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
        //$this->comments = Comment::all()->sortDesc();
        session()->flash('message','Utworzono komentarz !!!');
    }

    public function remove($commentId)
    {
        Comment::find($commentId)->delete();
        //$this->comments = Comment::all()->sortDesc();
        session()->flash('message','Usunięto komentarz !!!');
    }
    
    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}