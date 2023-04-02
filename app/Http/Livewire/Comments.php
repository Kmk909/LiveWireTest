<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Comments extends Component
{
    use WithPagination;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected',
    ];

    // for testing purpose whether can I use this variable from tickets.blade.php in livewire
    // public $test = "This is from comments.php";
    public $image;
    public $newComment;
    public $ticketId;

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(2)
        ]);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required']);
        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment,

            'user_id' => "1",
            'image' => $image,
            'support_ticket_id' => $this->ticketId,
        ]);

        $this->newComment = "";
        $this->image = "";
        session()->flash('message', 'Comment added.');
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        if ($this->image != null) {
            Storage::disk('public')->delete($comment->image);
        }
        $comment->delete();
        session()->flash('message', 'Comment deleted.');
    }



    public function updated($newComment)
    {
        $this->validateOnly($newComment, ['newComment' => 'max:255']);
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    public function storeImage()
    {
        if (!$this->image) return null;

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function ticketSelected($selectedTicketId)
    {
        $this->ticketId = $selectedTicketId;
    }
}
