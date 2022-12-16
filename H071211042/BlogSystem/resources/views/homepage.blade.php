@extends('layout.user')
@section('content')
    <!-- page-header -->
    <header class="page-header">
        <h1>ZABIL SABRI MUHAMMAD</h1>
    </header>
    <!-- end of page header -->

    <div class="container">
        <section>
            <div class="feature-posts">
                <a class="feature-post-item">                       
                    <span>Top Member</span>
                </a>
                @foreach($data as $item)
                <a href="memberDetail/{{ $item->id }}" class="feature-post-item">
                    <img src="{{asset('blogTemplate/assets/imgs/unknown_pic.jpg')}}" class="w-100" alt="prof-pic">
                    <div class="feature-post-caption">{{$item -> name}}</div>
                </a>
                @endforeach
            </div>
        </section>
        <hr>
        <div class="page-container">
            <div class="page-content">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Popular Category</h5> 
                    </div>
                    <div class="row">
                        @foreach($data2 as $item)
                        <div class="col-2 text-center">
                            <a class="btn btn-primary rounded">#{{$item->name}}</a>
                        </div>
                        @endforeach
                    </div>                
                </div>
                <hr>
                <div class="card-header text-center">
                        <h5 class="card-title">Popular Article</h5> 
                </div>
                <div class="row">
                    @foreach($data3 as $item)
                    <div class="col-lg-4">
                        <div class="card text-center mb-5">
                            <div class="card-header p-0">                                   
                                <div class="blog-media">
                                    <img src="http://127.0.0.1:8000/blogTemplate/assets/imgs/blog2.jpg" alt="" class="w-100">
                                    <a href="#" class="badge badge-primary">#{{ $item->category_id }}</a>        
                                </div>  
                            </div>
                            <div class="card-body px-0">
                                <h5 class="card-title mb-2">{{ $item->title }}</h5>    
                                <small class="small text-muted">{{ $item -> created_at }}
                                    <span class="px-2">-</span>
                                    <a href="#" class="text-muted">0 Comments</a>
                                </small>
                                <p class="my-2">{{ $item -> description }}</p>
                            </div>
                            
                            <div class="card-footer p-0 text-center">
                                <a href="single-post.html" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>                  
                        </div>
                    </div>
                    @endforeach
                <button class="btn btn-primary btn-block my-4">See More Posts</button>
            </div>

            <!-- Sidebar -->
            
        </div>
    </div>
    @endsection