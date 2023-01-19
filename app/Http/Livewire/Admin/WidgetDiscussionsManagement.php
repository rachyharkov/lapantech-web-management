<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostComment;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class WidgetDiscussionsManagement extends Component
{
    public $comments;

    public $comment_author, $comment_content, $comment_id;

    protected $listeners = [
        'updateComment'
    ];

    public function mount()
    {
        $this->comments = PostComment::with('post')->latest('created_at')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.admin.widget-discussions-management');
    }

    public function deleteComment($id)
    {
        PostComment::find($id)->delete();
    }

    public function editComment($id)
    {
        $data = PostComment::find($id);
        $this->comment_id = $id;
        $this->comment_author = $data->comment_author;
        $this->comment_content = $data->comment_content;
        $this->emit('editComment');
    }

    public function updateComment()
    {
        if ($this->comment_author == '' || $this->comment_content == '') {
            $this->dispatchBrowserEvent('triggerAlert', [
                'type' => 'error',
                'title' => 'Error',
                'icon' => 'error',
                'text' => 'Isian tidak boleh kosong!'
            ]);
        } else {
            PostComment::where('id', $this->comment_id)->first()->update([
                'comment_author' => $this->comment_author,
                'comment_content' => $this->comment_content,
            ]);

            $this->comment_author = '';
            $this->comment_content = '';
            $this->comment_id = '';

            $this->comments = PostComment::with('post')->latest('created_at')->take(3)->get();

            $this->dispatchBrowserEvent('closeEditCommentModal');
        }

    }
}
