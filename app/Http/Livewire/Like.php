<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;

class Like extends Component
{
    public Post $post;
    public int $count;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->count=$post->likes_count->count();
    }

    public function like(): void
    {
        if ($this->post->isLiked()) {
            $this->post->removeLike();

            $this->count--;
        } elseif (auth()->user()) {
            $this->post->likes_count()->create([
                'user_id' => auth()->id(),
                'post_id'=>$this->post->id
            ]);

            $this->count++;
        } 
    }

    public function render()
    {
        return view('livewire.like');
    }
}
