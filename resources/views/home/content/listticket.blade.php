@extends('home.index')
@section('a')

<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="index.html">Home</a>
                <span>New Phim</span>
            </div>

            <div class="movie-list">
                @foreach ($ticket as $item)
                <div class="movie">
                    <a href="{{ route('ticket', ['id'=>$item->id]) }}" class="movie-poster"><img src="imgUploads/{{$item->img}}" alt="#"></a>
                    <div class="movie-title"><a href="{{ route('ticket', ['id'=>$item->id]) }}" href="single.html"> {{$item->price}}$</a></div>
                    <p>{{$item->name_film}}</p>
                </div>
                @endforeach
            </div> <!-- .movie-list -->

            {{-- <div class="pagination">
                <a href="#" class="page-number prev"><i class="fa fa-angle-left"></i></a>
                <span class="page-number current">1</span>
                <a href="#" class="page-number">2</a>
                <a href="#" class="page-number">3</a>
                <a href="#" class="page-number">4</a>
                <a href="#" class="page-number">5</a>
                <a href="#" class="page-number next"><i class="fa fa-angle-right"></i></a>
            </div> --}}
        </div>
    </div> <!-- .container -->
</main>
@endsection