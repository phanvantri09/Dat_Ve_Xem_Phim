@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Input
                <strong>Sizes</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('postAdd.ticket') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-large" class=" form-control-label">Room</label>
                        </div>
                        <div class="col col-sm-8">
                            <select name="id_room" id="input-large"  class="input-lg form-control-lg form-control">
                                @foreach ($data as $item)
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
                            <input type="number" id="input-small" name="price"  class="input-sm form-control-sm form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Name film</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" id="input-normal" name="name_film" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Traller link</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" id="input-normal" name="link"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Image</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="file"  name="img"  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Time star</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="datetime-local" id="input-normal" name="time" placeholder="Normal" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-large" class=" form-control-label">Content</label>
                        </div>
                        <div class="col col-sm-8">
                            <textarea name="content" id="input-normal" cols="30" rows="10" class="form-control"></textarea>
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