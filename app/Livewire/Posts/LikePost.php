<?php

namespace App\Livewire\Posts;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public function mount($id) {
        $this->post = Post::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.posts.like-post', ['count' => $this->post->Likes->count(), 'isLike' => $this->post->isLike()]);
    }
    public function like() {
        $check = Like::where('user_id', Auth::user()->id)->where('post_id', $this->post->id)->exists();
        if ($check) {
            Like::where('user_id', Auth::user()->id)->where('post_id', $this->post->id)->delete();
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $this->post->id
            ]);
        }
        return true;
    }
}
