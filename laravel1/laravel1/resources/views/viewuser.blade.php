<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    @foreach ($user as $item)
    <div class="container bootstrap snippets bootdey">
        <div class="row">
          <div class="profile-nav col-md-3">
              <div class="panel">
                  <div class="user-heading round">
                      <a href="#">
                          <img src="{{ asset('images/'.$item->image) }}" alt="">
                      </a>
                      <h1>{{ $item->name }}</h1>
                      <p>{{ $item->email }}</p>
                      <p>{{ $item->sdt }}</p>
                  </div>
        
              </div>
          </div>
          <div class="profile-info col-md-9">
             
              <div class="panel">
                  <div class="bio-graph-heading">
                      <a href="/auth/home-1"><h1>Trang chủ</h1></a>
                  </div>
                  <div class="panel-body bio-graph-info">
                      <h1>Name: {{ $item->name }}</h1>
                      <div class="row">
                          
                          <div class="bio-row">
                              <p><span>Email </span>: {{$item->email}}</p>
                          </div>
                          <div class="bio-row">
                              <p><span>Mobile </span>: {{$item->sdt}}</p>
                          </div>
                          <div class="bio-row">
                            <form class=" g-3" method="POST" action="{{route('auth.change.id',['id'=>$item->id])}}">
                                @method('PUT')
                                @csrf
                                <div class="col-auto">
                                  <label for="inputPassword2" class="visually-hidden">Old Password</label>
                                  <input type="password" name="old_password" class="form-control" id="inputPassword2" placeholder="Old Password">
                                </div>
                                <br>
                                <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="inputPassword2" placeholder="New Password">
                                  </div>
                                  <br>
                                  <div class="col-auto">
                                    <label for="inputPassword2" class="visually-hidden">New Password</label>
                                    <input type="password" name="repassword" class="form-control" id="inputPassword2" placeholder="Re-enter Password">
                                  </div>
                                <div class="col-auto">
                                  <button type="submit" class="btn btn-primary mb-3">Change</button>
                                </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
    @endforeach

</body>
</html>