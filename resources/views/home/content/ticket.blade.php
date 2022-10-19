@extends('home.index')
@section('a')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <span>{{$ticket->name_film}}</span>
            </div>

            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-4">
                    <img src="/imgUploads/{{$ticket->img}}" alt="">
                    {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/uY-2uF5w0mg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                </div>
                <div class="col-md-8">
                    <p class="leading" style="color: rgb(50, 52, 50); font-weight: bold">{{$ticket->name_film}}</p>
                    <p class="leading" style="color: rgb(21, 255, 0)">{{$ticket->price}}$</p>
                    <p class="leading" style="color: brown">Time start: {{$ticket->time}}</p>
                    <p>{{$ticket->content}}</p>
                    <br>
                    @auth
                    <a style="background-color: rgb(46, 45, 45); padding: 8px; border: 0.2px solid rgb(251, 222, 0)" href="{{ route('book', ['id_ticket'=>$ticket->id]) }}">Đặt vé ngay</a>

                    @else 
                    <a style="background-color: rgb(46, 45, 45); padding: 8px; border: 0.2px solid rgb(251, 222, 0)" href="{{ route('login') }}">Đặt vé ngay</a>

                    @endauth
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <h2 class="section-title">Traller </h2>
                    <div>  {{$ticket->link}}</div>
                </div>
                <div class="col-md-3">
                    <h2 class="section-title">Useful Links</h2>
                    <ul class="arrow">
                        <li><a href="#">Eiusmod tempor incididunt</a></li> 
                        <li><a href="#">Tenim ad minim venia</a></li>
                        <li><a href="#">Quis nostrud exercitation</a></li> 
                        <li><a href="#">Ullamco laboris reprehenderit</a></li> 
                        <li><a href="#">Duis aute dolor voluptat</a></li>
                        <li><a href="#">Velit esse cillum dolore</a></li> 
                        <li><a href="#">Excepteur sint occaeca</a></li>
                    </ul>
                </div>
            </div> <!-- .row -->
        </div>
    </div> <!-- .container -->
</main>
@endsection