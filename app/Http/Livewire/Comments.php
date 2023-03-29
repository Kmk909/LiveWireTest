<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $newComment;

    public function render()
    {

        return view('livewire.comments',['comments'=>Comment::latest()->paginate(2)]);
    }

    public function addComment()
    {
        $this->validate(['newComment'=>'required']);

        $createdComment = Comment::create(['body'=>$this->newComment,'user_id'=>"1"]);

        $this->newComment = "";
        session()->flash('message','Comment added.');
    }

    public function remove($commentId){
        $comment = Comment::find($commentId);

        $comment->delete();
        session()->flash('message','Comment deleted.');
    }



    public function updated($newComment){
        $this->validateOnly($newComment,['newComment'=>'max:255']);
    }
}
