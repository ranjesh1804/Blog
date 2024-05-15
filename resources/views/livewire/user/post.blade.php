<div class="row layout-top-spacing">
                        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-10 col-md-12 col-sm-12 col-10">
                                            <h4>Blogs</h4>
                                        </div>
                                        <div class="col-xl-2 col-md-12 col-sm-12 col-12">
                                            <h4><input type="search" wire:model.live="search" placeholder="search.." class="form-control"></h4>
                                        </div>
                                    </div>
                                </div>


                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-4">
                                            <thead>
                                                
                                            </thead>
                                            <tbody>
                                            @if(count($blogs) > 0)
                                    @foreach ($blogs as $key =>  $blog)
                                                <tr>
                                                    <td> {{ $loop->index+1 }}</td>
                                            <td class="text-center"><img src="{{ $blog->image }}" style="height: 100px;width:100px;"></td>
                                            <td> {{ $blog->title }} </br>
                                            <b> Publish Date </b> {{ $blog->publish_date }}
                                            </td>

                                                  
                                                 
                         
                                                    <td> 
                                                    @php
                                        $encodedData_edit = base64_encode(json_encode($blog->id));

                                        @endphp
   
                                        <a href="{{route('user.view_post',$encodedData_edit)}}" target="_blank"  class="btn btn-primary mb-2 mr-2" >ReadMore.. </a>
                                   </td>
                                              
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