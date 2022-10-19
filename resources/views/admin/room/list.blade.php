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
                        <th>name</th>
                        <th>amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="tr-shadow">
                        
                        <td>{{$item->name}}</td>
                        <td>
                            <span class="block-email">{{$item->amount}}</span>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                {{-- <a href="{{ route('', ['id'=>1]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </a> --}}
                                <a href="{{ route('edit.room', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{ route('delete.room', ['id'=>$item->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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