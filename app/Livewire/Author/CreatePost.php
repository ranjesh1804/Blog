<?php

namespace App\Livewire\Author;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Auth;
class CreatePost extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    private $blogs;
    public $title,$image,$content;
    public $edit_title,$edit_image,$edit_content,$editIid;
    public function render()
    {
        $this->blogs=Blog::where('author_id',Auth::user()->id)->paginate(10);
        return view('livewire.author.create-post',['blogs'=>$this->blogs]);
    }
    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $addblog = new Blog;
        $addblog->title = $this->title;
        $addblog->author_id = Auth::user()->id;
        $addblog->author_name = Auth::user()->name;
        $addblog->content = $this->content;
        $addblog->publish_date = date('Y-m-d');
      
        if($this->image){
            $this->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $imageName = 'Blog_'.time() . '.' . $this->image->extension();
           $a= $this->image->storeAs('/images/blogs', $imageName,'public');
            $addblog->image = $a;
        }
        $addblog->save();

        $this->dispatch('alert', [
            'type' => 'success',
            'message' => "Updated Successfully"
        ]);
        
          return redirect()->route('create_post');

     
    }
    public function status_update($update_id){
        $category = Blog::find($update_id);
        if($category){
            if($category->status == "0"){
                $category->status = "1";
            }else{
                $category->status = "0";
            }
            $category->save();
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => "Updated Successfully"
            ]);
        }
    }


    public function edit_id($id)
    {
        $this->editIid=$id;

        $editBlog = Blog::find($id);
        $this->edit_title=$editBlog->title;
        $this->edit_content=$editBlog->content;


    }
    
    public function update()
    {
        $editBlog = Blog::find($this->editIid);

        $editBlog->title = $this->edit_title;
        $editBlog->content = $this->edit_content;
        if($this->edit_image){
            $this->validate([
        
                'edit_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    
    
            ]);
            $imageName = 'Blog_'.time() . '.' . $this->edit_image->extension();
           $a= $this->edit_image->storeAs('/images/blogs', $imageName,'public');
            $editBlog->image = $a;
        }

        $editBlog->save();
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => "Updated Successfully"
        ]);
        
          return redirect()->route('create_post');
    }
    public function delete($id)
{
    $editBlog = Blog::find($id)->delete();

}
}
