@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Settings')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Laravel|CRUID</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="cc/style.css">
    <link rel="stylesheet" href="../../dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="../../dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="../../dist/css/latform-style-1.min.css" type="text/css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3"style="margin-top:50px">
            <h4>ADD NEW RECORD|LARAVEL CRUD<h4>
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
            <form action="add"method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter FullNames" value="{{old('name')}}">
                    <span style="color:red">@error('name')@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name ="email" placeholder="Enter Email"value="{{old('email')}}">
                    <span style="color:red">@error('email')@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Your Color</label>
                    <input type="text" class="form-control" name= "favoriteColor" placeholder="Enter Your Color"value="{{old('favoriteColor')}}">
                    <span style="color:red">@error('favoriteColor')@enderror</span>
                </div>
                <div class="form-group m-0">
                <button type="submit" class="btn btn-primary btn-block">
                                        Save
                </button>
                </div>

             </form>
             <!---------Form ya kuget data from db---------------->
             <br>
             <table class="table table-hover">
                <thead>
                <th>Name</th> 
                <th>Email</th> 
                <th>Favorite Color</th>
                <th>Actions</th>
                </thead>
                <tbody>
                	<!------------------------------
             @foreach($list as $item)     
             <tr>
             <td>{{$item->name}}</td>
             <td>{{$item->email}}</td>
              <td>{{$item->favoriteColor}}</td>
             <td>
            <div class="btn-group">
                <a href="delete/{{$item->id}}"class="btn btn-danger btn-xs">Delete</a>
                <a href="edit/{{$item->id}}"class="btn btn-primary btn-xs">Edit</a>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <!-------- ---------------->


         </div>
    </div>
</div>
 </body>
</html>

@endsection