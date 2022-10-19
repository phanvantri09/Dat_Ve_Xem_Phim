@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Input
                <strong>Sizes</strong>
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
        </div>
            <div class="card-body card-block">
                <form action="{{ route('postEdit.ticket') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-large" class=" form-control-label">Room</label>
                        </div>
                        <div class="col col-sm-8">
                            <select name="id_room" id="input-large"  class="input-lg form-control-lg form-control">
                                @foreach ($data1 as $item)
                                @if ($item->id == $data->id_room)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                                @foreach ($data1 as $item)
                                @if ($item->id == $data->id_room)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-small" class=" form-control-label">Price</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="hidden" id="input-small" name="id_room_old" value="{{$data->id_room}}"  class="input-sm form-control-sm form-control">
                            <input type="hidden" id="input-small" name="id_ticket" value="{{$data->id}}"  class="input-sm form-control-sm form-control">
                            <input type="number" id="input-small" name="price" value="{{$data->price}}"  class="input-sm form-control-sm form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Name film</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" id="input-normal" name="name_film" value="{{$data->name_film}}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Traller link</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" id="input-normal" name="link" value="{{$data->link}}"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Image</label>
                        </div>
                        <div class="col col-sm-8">
                            <img src="imgUploads/{{$data->img}}" alt="">
                            <input type="file"  name="img" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Time star</label>
                        </div>
                        <div class="col col-sm-8">
                            <strong>{{$data->time}}</strong>
                            <input type="datetime-local" id="input-normal" name="time" placeholder="Normal" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-large" class=" form-control-label">Content</label>
                        </div>
                        <div class="col col-sm-8">
                            <textarea name="content" id="input-normal" cols="30" rows="10"  class="form-control">{{$data->content}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection