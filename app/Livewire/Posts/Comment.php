<?php

namespace App\Livewire\Posts;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $post, $body;

    public function mount($id) {
        $this->post = Post::find($id);
    }

    public function render()
    {

        return view('livewire.posts.comment', [
            'comments' => ModelsComment::where('post_id', $this->post->id)->get(),
            'total_comments' => ModelsComment::where('post_id', $this->post->id)->count(),
        ]);
    }

    public function store()
    {
        $this->validate(['body' => 'required']);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body
        ]);

        if ($comment) {
            session()->flash('success', 'Kommentar Berhasil dibuat');
            return redirect()->route('share');
        }
    }
}
