@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35 t">Data table</h3>
        <div class="w3layoutscontaineragileits">
            <div class="col-lg-12">
          @if(session('thongbao'))
          <div class="alert alert-success">
              <span style="color: red; font-size: 20px;">{{session('thongbao')}}</span>
          </div>
          @endif
      </div>
    </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>Room</th>
                        <th>Name film</th>
                        <th>time</th>
                        <th>Img</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="tr-shadow">
                        
                        <td>
                            @foreach ($data1 as $da)
                            @if ($da->id == $item->id_room)
                                {{$da->name}}
                            @endif
                            @endforeach</td>
                        <td>
                            <span class="block-email">{{$item->name_film}}</span>
                        </td>
                        <td>
                            <span class="block-email">{{$item->time}}</span>
                        </td>
                        <td>
                            <img style="height: 100px; width: 100px;" src="imgUploads/{{$item->img}}" alt="">
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{ route('stateticket', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Location">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="{{ route('edit.ticket', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{ route('delete.ticket', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                                {{-- <a href="{{ route('edit.user', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </a> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection