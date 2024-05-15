<div wire:ignore.self class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                
                <svg  style="color:brown;font-weight:bold" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <div class="row mb-2">
                        <div class="col-sm-6">
                        <label>Title</label>
                            <input type="text" wire:model="title" id="name" class="form-control" placeholder="Title" autocomplete="off">
                            @error('title') <span class="error text-danger"><b><b><b><b>{{$message}}</b></b></b></b></span> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Image</label>
                            <input type="file" wire:model="image" id="text" class="form-control" placeholder="" autocomplete="off">
                            @error('image') <span class="error text-danger"><b><b><b><b><b>{{$message}}</b></b></b></b></b></span> @enderror
                        </div>
                    </div>
                   
                    <div class="row mb-2">
                    <div class="col-sm-12">
                    <label>Content</label>
                            <textarea type="text" wire:model="content" id="name" class="form-control" placeholder="content" autocomplete="off"></textarea>
                            @error('content') <span class="error text-danger"><b><b><b><b>{{$message}}</b></b></b></b></span> @enderror
                     
                    </div>
                      </div>
                  
                  
                   
                    <div class="row mb-2">
                      
                     
                     
                  </div>
                    
            </div>
            <div class="modal-footer">
            <button class="btn"  data-dismiss="modal" id="add_model_close"> No</button>
                <button type="button"  wire:click="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>