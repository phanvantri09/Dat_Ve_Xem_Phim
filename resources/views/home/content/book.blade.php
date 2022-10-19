@extends('home.index')
@section('a')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="index.html">Home</a>
                <span>Contact</span>
            </div>
            <div class="w3layoutscontaineragileits">
                <div class="col-lg-12">
              @if(session('thongbao'))
              <div class="alert alert-success">
                  <span style="color: red; font-size: 20px;">{{session('thongbao')}}</span>
              </div>
              @endif
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
              @endif
          </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact</h2>
                        <ul class="contact-detail">
                            <li>
                                <img src="page/images/icon-contact-message.png" alt="">
                                <a href="mailto:contact@companyname.com">contact@companyname.com</a>
                            </li>
                        </ul>
                        <form action="{{ route('postbook') }}" method="post" enctype="multipart/form-data" class="contact-form">
                            @csrf
                            <input type="text" class="name" placeholder="{{Auth::user()->name}}">
                            <input type="text" class="email"placeholder="{{Auth::user()->email}}">
                            <input type="text" name="numberphone" class="numberphone"placeholder="Number phone">
                            <input type="hidden" name="id_ticket" class="email" value="{{$ticket->id}}" placeholder="email...">
                            <br>
                            <div> <span style="color: red">red </span>: booked</div>
                            <div> <span>white </span>:  not booked yet</div>
                            <br>
                            {{-- <textarea class="message" placeholder="message..."></textarea> --}}
                            
                            @foreach ($location as $key => $item)
                            @if ($state[$key]->state == 0)
                            <div class="col-md-1">
                                <input class="p-2 "  value="{{$state[$key]->id}}"  name="location[]" placeholder="{{$item->name}}"  type="checkbox"  id="flexCheckDefault">
                                <span class="p-2  ">{{$item->name}}</span>
                              </div>
                            @else 
                            <div class="col-md-1">
                                <input class="p-2 "  value="{{$state[$key]->id}}" checked  placeholder="{{$item->name}}"  type="checkbox"  id="flexCheckDefault">
                                <span style="color: red" class="p-2 ">{{$item->name}}</span>
                              </div>
                            @endif
                            @endforeach
                            <br><br>
                            <button type="submit">Book now</button>

                        </form>
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection