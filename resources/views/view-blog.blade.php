@include('header')
<div class="container">
        <div class="view-blog">
            <div class="row">
                <div class="item text-center">
                    <div class="title pt-3 pb-3">
                        <h1>{{$blog->title}}</h1>
                    </div>
                    <div class="title-image">
                        <img src="{{asset('/images/'.$blog->picture)}}" class="img-fluid w-75" alt="...">
                    </div>
                    <div class="title-description d-flex justify-content-center mt-3 text-center pb-4">
                        <p class="w-75">{{$blog->body}}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="container mt-3">
                <div class="row height d-flex justify-content-center align-items-center pb-4">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="p-3">
                                <h5>Comments</h5>
                            </div>
                            <div class=" d-flex flex-row align-items-center p-3 form-color">
                                <img src="images/cute.png" width="50" class="rounded-circle mr-2">
                                <input type="text" class="form-control ms-2" placeholder="Enter your comment..."> </div>
                            <p class="my-0 d-flex justify-content-end" id="mybtn"><a href="#" class="btn btn-primary">Submit</a></p>
                            <div class="mt-2">
                                <div class="d-flex flex-row p-3"> <img src="images/cute.png" width="40" height="40" class="rounded-circle mr-3">
                                    <div class="w-100 ms-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center"> <span class="mr-2">Brian selter</span> </div> <small>12h ago</small>
                                        </div>
                                        <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer')