<x-admin-master>
    @section('content')
        <h1>User profile for : {{$user->name}}</h1>


    <div class="row">
        <div class="col-sm-6">
            <form action="{{route('user.profile.update',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <img class="img-profile rounded-circle" src="{{$user->avatar}}">
                </div>
                
                <div class="form-group">
                  <label for="avatar">avatar</label>
                  <input type="file" class="form-control-file" name="avatar" id="avatar" >

                  @error('avatar')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="username">username</label>
                  <input type="text" name="username" id="username" class="form-control {{$errors->has('username') ? 'is-invalid':''}}" value={{$user->username}} aria-describedby="usernameId">
                  @error('username')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
              
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value={{$user->name}} aria-describedby="namehelpId">

                  @error('name')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" name="email" id="name" class="form-control" value={{$user->email}} aria-describedby="namehelpId">
                  @error('email')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
           
                </div>

                <div class="form-group">
                  <label for="password">password</label>
                  <input type="password" name="password" id="password" class="form-control"  aria-describedby="helpId">
            
                  @error('password')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password-confirmation">confirmPassword</label>
                  <input type="password" name="password-confirmation" id="password-confirmation" class="form-control"  aria-describedby="helpId">
          
                  @error('password_confirmation')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>

                



           

                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>options</th>
                    <th>Id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>options</th>
                    <th>Id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                  </tr>
                </tfoot>
              <tbody>
                @foreach($roles as $role)
                  <tr>
                    <td><div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="options" id="options" value="checkedValue" 
                        @foreach($user->roles as $user_role)
                          @if($user_role->slug == $role->slug)
                            checked
                          @endif
                        @endforeach
                        >
                    
                      </label>
                    </div></td>
                    <td>{{$role -> id}}</td>
                    <td>{{$role -> name}}</td>
                    <td>{{$role -> slug}}</td>
                    <td><button type="button" name=""  id="" class="btn btn-primary" >Attach</button></td>
                    <td><button type="button" name="" id="" class="btn btn-danger" >Detach</button></td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>


 


      </div>
    </div>
    @endsection
</x-admin-master>

