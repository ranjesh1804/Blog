<div class="row layout-top-spacing">
                        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-10 col-md-12 col-sm-12 col-10">
                                            <h4>Blogs</h4>
                                        </div>
                                        <div class="col-xl-2 col-md-12 col-sm-12 col-2 mt-2">
                                        <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#addpost">
                                          Add
                                        </button>
                                        </div>
                                    </div>
                                </div>
    @include('modals.post.add')
    @include('modals.post.edit')

                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-4">
                                            <thead>
                                                <tr>
                                                <th class="text-center">Sno</th>

                                                    <th class="text-center">Title</th>
                                                    <th class="text-center">Image</th>
                                                    <th class="text-center">Content</th>
                                                    <th class="text-center">Publish Date</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center" colspan="2">Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($blogs) > 0)
                                    @foreach ($blogs as $key =>  $blog)
                                                <tr>
                                                    <td> {{ $loop->index+1 }}</td>
                                                    <td> {{ $blog->title }}</td>
                                            <td class="text-center"><img src="{{ $blog->image }}" style="height: 100px;width:100px;"></td>

                                                    <td> {{ $blog->content }}</td>
                                                    <td> {{ $blog->publish_date }}</td>
                                                    <td class="text-center"><span class="text-success">  <label class="switch s-icons s-outline s-outline-success mr-2" style="margin-bottom: 0px !important">
                                                    <input type="checkbox" wire:change="status_update({{$blog->id}})" id="status_{{$key}}" {{ ($blog->status == 1) ? "checked" : "" }}>
                                                    <span class="slider round"></span>
                                                </label></span></td>
                                                  
                                                    <td>   <button type="button"  wire:click="edit_id({{$blog->id}})" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#editpost">Edit </button></td>
                                                    <td>   <button type="button"  wire:click="delete({{$blog->id}})" class="btn btn-primary mb-2 mr-2" >Delete </button></td>
                                              
                                                </tr>
                                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            <center><b>No Record Found</b> </center></td>
                                    </tr>
                                @endif
                                            </tbody>
                                        </table>
                                     
                                        {!! $blogs->links() !!}
                                    </div>

                                  

                                </div>
                            </div>
                        </div>