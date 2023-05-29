<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{   
    use WithPagination;
    
    public $newComment = '';
    protected $paginationTheme = 'bootstrap';
    public $image;
    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($image)
    {
        $this->image = $image;
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
        $image = $this->storeImage();
        $createdComment = Comment::create([
            'body'              => $this->newComment, 
            'user_id' => 1,
            'image' => $image,
        ]);
        $createdComment->save();
        $this->newComment = '';
        $this->image = '';
        session()->flash('message','Utworzono komentarz !!!');
    }

    public function storeImage()
    {
        if(!$this->image)
        {
            return null;    
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $imgName = Str::random() . '.jpg';
        Storage::disk('public')->put($imgName, $img);
        return $imgName; // to zostanie wstawione do pola image w tabeli comments w DB
    }

    public function remove($commentId)
    {
        $commentToDelete = Comment::find($commentId);
        if($commentToDelete->image)
        {
            Storage::disk('public')->delete($commentToDelete->image);
        }        
        $commentToDelete->delete();
        session()->flash('message','Usunięto komentarz !!!');
    }
    
    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}