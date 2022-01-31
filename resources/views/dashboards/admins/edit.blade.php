<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Laravel|CRUID</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="cc/style.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../../dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="../../dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="../../dist/css/latform-style-1.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"style="margin-top:50px">
            <h4>{{$Title}}|LARAVEL CRUD<h4>
                <hr>


                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif
            <form action="{{ route('update') }}" method="post">
                @csrf
                <input type="hidden"name="cid"value="{{$Info->id}}">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter FullNames" value="{{$Info->name}}">
                    <span style="color:rgb(22, 18, 18)">@error('name')@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name ="email" placeholder="Enter Email"value="{{$Info->email}}">
                    <span style="color:rgb(145, 5, 126)">@error('email')@enderror</span>
                </div>


                <div class="form-group">
                    <label for="">Role</label>
                    <input type="text" class="form-control" name ="role" placeholder="Enter Role"value="{{$Info->role}}">
                    <span style="color:rgb(145, 5, 126)">@error('role')@enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Your Color</label>
                    <input type="text" class="form-control" name= "favoriteColor" placeholder="Enter Your Color"value="{{$Info->favoriteColor}}">
                    <span style="color:rgb(63, 6, 55)">@error('favoriteColor')@enderror</span>
                </div>
                <div class="form-group m-0">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>

            

         </div>
    </div>
</div>
 </body>
</html>