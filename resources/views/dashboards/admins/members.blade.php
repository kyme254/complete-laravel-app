@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Members')

@section('content')
<!---------Form ya kuget data from db---------------->
             <br>
             @if(Session::has('success'))
               <div class="alert alert-success">
                  <p>{{ session('success') }}</p>
               </div>
               @endif
               @if(Session::has('fail'))
               <div class="alert alert-danger">
                  <p>{{ session('fail') }}</p>
               </div>
               @endif
             <table class="table table-hover">
                <thead>
                <th>Name</th> 
                <th>Email</th>
                 <th>Role</th>
                <th>Favorite Color</th>

                <th>Actions</th>
                </thead>
                <tbody>
             @foreach($list as $item)     
             <tr>
             <td>{{$item->name}}</td>
             <td>{{$item->email}}</td>
             <td>{{$item->role}}</td>
              <td>{{$item->favoriteColor}}</td>
             <td>
            <div class="btn-group">
                <a href="{{ route('delete', $id=$item->id) }}"class="btn btn-danger btn-xs">Delete</a>
                <a href="{{ route('edit', $id=$item->id) }}"class="btn btn-primary btn-xs">Edit</a>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            <!--------End-Form ---------------->

@endsection
