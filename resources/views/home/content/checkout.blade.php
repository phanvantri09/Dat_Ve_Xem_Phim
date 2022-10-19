@extends('home.index')
@section('a')
@if (isset($nulll))
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">
                   <h1 >No ticket</h1>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                </div>
              
            </div>
        </div>
    </div> <!-- .container -->
</main>
@else
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($data as $da)
                        @foreach ($ticket as $ti)
                            @if ($ti->id == $da->id_ticket)
                                @foreach ($room as $ro)
                                    @if ($ro->id == $ti->id_room)
                                        <h2 class="section-title">Name film: {{$ti->name_film}}</h2>
                                        <p>Number phone: {{$da->numberphone}}</p>
                                        <ul class="movie-schedule">
                                            <li>
                                                <div class="date"> Thời gian:{{$ti->time}}</div>
                                                <h2 class="entry-title"><a href="#">{{Auth::user()->name}}</a></h2> | &nbsp;
                                                <h2 class="entry-title"><a href="#">{{Auth::user()->email}}</a></h2> | &nbsp;
                                                <h2 class="entry-title"><a href="#">{{$da->created_at}}</a></h2> | &nbsp;
                                                <?php
                                                $loca = explode(',',$da->location);
                                                ?>
                                                <h2 class="entry-title"><a href="#">Location: 
                                                    @foreach ($loca as $lo)
                                                    <?php 
                                                    $k = abs($lo);
                                                    $m = $k-$id_sta_f;

                                                    ?>
                                                        {{$location[$m+1]->name}} - 
                                                    @endforeach
                                            </a></h2>
                                                {{-- <h2 class="entry-title"><a href="#">Location: {{$la->name}}</a></h2> --}}
                                            </li>
                                        </ul> <!-- .movie-schedule -->
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    
                    @endforeach
                </div>
              
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endif

@endsection