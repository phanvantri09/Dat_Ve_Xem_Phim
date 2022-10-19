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
                        <th>Location</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < $amount; $i++)
                        
                    <tr class="tr-shadow">
                        
                        <td>
                            {{$location[$i]->name}}
                        </td>
                        <td>
                                @if ($state[$i]->state == 0)
                            
                                <span class="block-email bg-primary">
                                     not book yet
                                </span>
                                @endif
                                @if($state[$i]->state == 1)
                                <span class="block-email bg-danger ">
                                    Booked
                                </span>
                                @endif
                                @if($state[$i]->state == 2)
                                <span class="block-email bg-success ">
                                    payed
                                </span>
                                @endif
                        </td>
                        
                        <td>
                            <div class="table-data-feature">
                                @if ($state[$i]->state == 0)
                                <a href="{{ route('change', ['id'=>$state[$i]->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="change">
                                    <i class="fas fa-check-circle"></i>
                                </a>@endif
                                @if ($state[$i]->state == 1)
                                <a href="{{ route('check', ['id'=>$state[$i]->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Check ticket pay">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ route('change', ['id'=>$state[$i]->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="change">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endfor
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>
@endsection