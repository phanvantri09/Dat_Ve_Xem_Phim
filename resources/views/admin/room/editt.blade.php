@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Form</strong>
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
                <form action="{{ route('postEdit.room') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-small" class=" form-control-label">Name</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="hidden" id="input-small" name="id" value="{{$id}}" class="input-sm form-control-sm form-control">

                            <input type="text" id="input-small" name="name" value="{{$data->name}}" class="input-sm form-control-sm form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="input-normal" class=" form-control-label">Amount</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="number" id="input-normal" name="amount" value="{{$data->amount}}" class="form-control">
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