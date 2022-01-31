@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Order Form')

@section('content')
<div class="mt-4 mx-5">
    <h2>Add an Order</h2>
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
    <form action="{{route('add')}}" class="mt-4" method="post">
      @csrf
      <div class="mb-3">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title e.g Website">
        @error('title')
          <span class="text-danger">Title is Required.</span>
        @enderror
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Full Nmes:</label>
            <input type="text" min="1" class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter Full Names">
            @error('fname')
              <span class="text-danger">Full Names  is required.</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Mobile Number:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Mobile +254">
            @error('phone')
              <span class="text-danger">Mobile Number is Required.</span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email">
            @error('email')
              <span class="text-danger">Email is Required.</span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Home County:</label>
            <input type="text" class="form-control @error('county') is-invalid @enderror" name="county" placeholder="Enter Your County">
            @error('county')
              <span class="text-danger">County is Required.</span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="serving">Sub- County:</label>
            <input type="text" class="form-control @error('subcounty') is-invalid @enderror" name="subcounty" placeholder="Enter Your Sub-County">
            @error('subcounty')
              <span class="text-danger">Sub-County is Required.</span>
            @enderror
          </div>
        </div>

      </div>
      <div class="mb-3">
        <label for="description">Description:</label>
        <textarea name="description" cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter full Description"></textarea>
        @error('description')
          <span class="text-danger">Full Description is Required.</span>
        @enderror
      </div>
      <input type="submit" value="Add Order" class="btn btn-dark">
    </form>
  </div>


@endsection
