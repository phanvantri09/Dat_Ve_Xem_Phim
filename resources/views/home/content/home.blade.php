@extends('home.index')
@section('a')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-9">
                    <div class="slider">
                        <ul class="slides">
                            <li><a href="#"><img src="page/dummy/slide-1.jpg" alt="Slide 1"></a></li>
                            <li><a href="#"><img src="page/dummy/slide-2.jpg" alt="Slide 2"></a></li>
                            <li><a href="#"><img src="page/dummy/slide-3.jpg" alt="Slide 3"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="latest-movie">
                                <a href="#"><img src="page/dummy/anh2.jpg" alt="Movie 1"></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="latest-movie">
                                <a href="#"><img src="page/dummy/anh10.jpg" alt="Movie 1"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                        <a href="#"><img src="page/dummy/anh1.jpg" alt="Movie 3"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                        <a href="#"><img src="page/dummy/anh3.jpg" alt="Movie 4"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                        <a href="#"><img src="page/dummy/anh7.jpeg" alt="Movie 5"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                        <a href="#"><img src="page/dummy/anh9.jpg" alt="Movie 6"></a>
                    </div>
                </div>
            </div> <!-- .row -->
            
           
            <div class="row">
                <h1 style="text-align: center; color: black">Hot film</h1>
                <div class="movie-list">
                    @foreach ($ticket as $item)
                    <div class="movie">
                        <a href="{{ route('ticket', ['id'=>$item->id]) }}" class="movie-poster"><img src="imgUploads/{{$item->img}}" alt="#"></a>
                        <div class="movie-title"><a href="{{ route('ticket', ['id'=>$item->id]) }}" href="single.html">{{$item->price}}$</a></div>
                        <div class="movie-title" ><a href="{{ route('ticket', ['id'=>$item->id]) }}" style="color: rgb(53, 52, 51); font-weight: bold; font-size: 20px">{{$item->name_film}}</a></div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection