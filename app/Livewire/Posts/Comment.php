<?php

namespace App\Livewire\Posts;

use App\Models\Comment as ModelsComment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $post, $body, $body2;
    public $comment_id, $edit_comment_id;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {

        return view('livewire.posts.comment', [
            'comments' => ModelsComment::with(['user', 'childrens'])
            ->where('post_id', $this->post->id)
            ->whereNull('comment_id')->latest()->get(),
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
            $this->body = null;
            session()->flash('success', 'Komentar berhasil dibuat');
        } else {
            session()->flash('error', 'Komentar gagal dibuat');
        }
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id = NULL;
        $this->body2 = NULL;
    }

    public function cancelReply()
    {
        // Reset data atau melakukan aksi pembatalan lainnya
        $this->comment_id = null;
        $this->body2 = '';

    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::find($this->comment_id);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        if ($comment) {
            $this->body2 = null;
            $this->comment_id = NULL;
            session()->flash('success', 'Komentar berhasil dibuat');
        } else {
            session()->flash('error', 'Komentar gagal dibuat');
        }
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->comment_id = NULL;
    }

    public function cancelEdit()
    {
        // Reset data atau melakukan aksi pembatalan lainnya
        $this->edit_comment_id = null;
        $this->body2 = '';

    }


    public function update()
    {
        $this->validate(['body2' => 'required']);

        $comment = ModelsComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2
        ]);

        if ($comment) {
            $this->body = NULL;
            $this->edit_comment_id = NULL;
            session()->flash('success', 'Komentar berhasil diupdate');
        } else {
            session()->flash('error', 'Komentar gagal diubah');
        }
    }


    public function delete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return NULL;
            session()->flash('error', 'Komentar berhasil dihapus');
        } else {
            session()->flash('error', 'Komentar gagal dihapus');
        }
    }


    public function like($id)
    {
        $data = [
            'comment_id' => $id,
            'user_id' => Auth::user()->id
        ];

        $like = Like::where($data);

        if ($like->count() > 0) {
            $like->delete();
        } else {
            Like::create($data);
        }

        return NULL;
    }
}
