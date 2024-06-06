<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogComment;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentsMail;

class ViewPost extends Component
{
    public $request_segment, $comment_blog;
    public $author_name, $title, $publish_date, $image, $content, $author_id, $comment_box;
    function __construct()
    {
        $encodedData = Request::segment('3');

        $this->request_segment = json_decode(base64_decode($encodedData), true);
        //   dd($this->request_segment);


    }
    public function comment()
    {
        $blog_add = new BlogComment;
        $blog_add->author_id = $this->author_id;
        $blog_add->user_id = Auth::user()->id;
        $blog_add->blog_id = $this->request_segment;
        $blog_add->comments = $this->comment_box;
        $blog_add->save();
        $user = User::where('id', Auth::user()->id)->first();

        $author = User::where('id', $this->author_id)->first();
        $text_email = $author->email;
        $author_name=$author->name;
        Mail::to($text_email)->send(new CommentsMail($user->name, $this->comment_box,$author_name));

        $pre_url = url()->previous();


        return redirect($pre_url);
    }
    public function render()
    {
        $blog = Blog::where('id', $this->request_segment)->first();
        if ($blog) {
            $this->author_id = $blog->author_id;
            $this->author_name = $blog->author_name;
            $this->title = $blog->title;
            $this->publish_date = $blog->publish_date;
            $this->image = $blog->image;
            $this->content = $blog->content;



            $blog_comment = BlogComment::where('blog_id', $this->request_segment)->get();
            if (count($blog_comment)>0) {
         
            
                foreach ($blog_comment as $comment) {
                    $dataObj = new \stdClass();
                    $blog = User::where('id', $comment->user_id)->first();


                    $dataObj->user_name = $blog->name;
                    $dataObj->comment = $comment->comments;

                    $this->comment_blog[] = $dataObj;
                }
            
        }
        else{
            $this->comment_blog= [];

        }
        }

        return view('livewire.user.view-post');
    }
}
