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
    @endsection
</x-admin-master>

