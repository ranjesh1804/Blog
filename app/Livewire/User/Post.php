<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;
  
    protected $paginationTheme = 'bootstrap';
    private $blogs;
    public $search,$initial=0;

    public function render()
    {
        if($this->search !=null){

            $this->blogs = Blog::where('status', '1')
            ->where(function($query) {
                $query->where('title', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('content', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(10);
        
        }
        else{
            $initial=0;
            $this->blogs=Blog::where('status','1')->paginate(10);

        }
        return view('livewire.user.post',['blogs'=>$this->blogs]);
    }
}
