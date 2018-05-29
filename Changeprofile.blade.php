
@extends('layouts.app')

@section('content')

<div class="jumbotron" style="background-color: #FFFFF0">
        <center>
          <form class="" action="{{url('profile/'.$user->id.'/update')}}" method="post" enctype="">
            {{csrf_field()}}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('ProImage') ? ' has-error' : '' }}">
              <label for="ProImage" class="col-md-4 control-label">Profile Image</label>

              <div class="col-md-6">
                  <input id="ProImage" type="file" class="form-control" name="ProImage"  required>

              </div>
          </div>

          <div class="form-group{{ $errors->has('Cover') ? ' has-error' : '' }}">
              <label for="Cover" class="col-md-4 control-label">Cover Image</label>
          <div class="col-md-6">
                  <input id="Cover" type="file" class="form-control" name="Cover"  required>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-danger">Enregestrer</button>

        </div>
        </form>


		</center>
</div>

@endsection
