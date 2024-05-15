<div class="row layout-top-spacing" >
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-10 col-md-12 col-sm-12 col-10">
                        <h4>Blogs</h4>
                    </div>

                </div>
            </div>


            <div class="widget-content widget-content-area" >
                <div class="table-responsive">
                    <table class="table table-bordered mb-4">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <b style="color:black"> {{$title}} </b>
                            </tr>
                            <tr>
                                <center> <img src="{{$image }}" style="height: 400px;width:500px;"> </center>
                            </tr>
                            </br>
                            <tr class="">
                                <b> {{$content}} </b>
                            </tr>

                            </br>
                          

@foreach($comment_blog as $comments)
<tr class="">
<b style="color:blue"> {{$comments->user_name}} </b>
</br>

<b> {{$comments->comment}} </b>
</tr>
</br>
@endforeach



                            </br>
                            <tr class="">
                                <input type="text" wire:model="comment_box" id="name" class="form-control" placeholder="Write your comment.." >

                            </tr>
                            </br>
                            <tr class="">
                                <button type="button" wire:click="comment()" class="btn btn-primary mb-2 mr-2">Send </button>
                            </tr>

                        </tbody>
                    </table>


                </div>



            </div>
        </div>
    </div>