<!DOCTYPE html>
<html lang="en" >
    <base href="/public">
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Admin Panel 2</title>
  <meta name="viewport" content="width=device-width"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
@include('admin.style')
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
    <header>
        <hgroup class="logo span-6">

        </hgroup>
        <nav class="session-nav span-6">
          <ul>
            <li class="show-menu">
              <a href="">
                <span class="ion-navicon-round"></span>
              </a>
            </li>
            <li class="account-settings">
              <a href="/chef/profile">
                <span class="ion-person"></span>
              </a>
            </li>
            <li class="logout">
              <a href="" >
                <span class="ion-power"></span>
              </a>
            </li>
          </ul>
        </nav>
    </header>
  </div>


@include('admin.sidebar')


<section id="main-content">
    <div class="container">
      <div class="span-12">
        <nav class="breadcrumb-nav">
          <a href="redirects">Dashboard</a> &raquo;
          <a href="{{url('/chefs')}}">chefs</a> &raquo;

        </nav>
      </div>


    </div>
  </section>
  <div class="container-fluid page-body">

    <div class="container" align="center" style="padding-top: 100px;">
        @if(session()->has('message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">x</button>
      {{session()->get('message')}}
    </div>
    @endif
      <form action="{{url('/addfoodchefs')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div style="padding: 15px;">
          <label>chef Name</label>
          <input type="text" style="color:black" name="name" placeholder="chef Name" required="">

    </div>

    <div style="padding: 15px;">
        <label>chef Image</label>
        <input type="file" name="image" required>
        <div id="image-holder"></div>

  </div>

    <div style="padding: 15px;">
          <label>speciality</label>
          <input type="text" style="color:black" name="speciality" placeholder="speciality" required="">

    </div>
    <div style="padding: 15px;">
        <label>FB </label>
        <input type="text" style="color:black" name="fb" placeholder="Facebook Link" required="">

  </div>
  <div style="padding: 15px;">
    <label>Tweeter ID</label>
    <input type="text" style="color:black" name="tweeter" placeholder="Tweeter ID" required="">

</div>
<div style="padding: 15px;">
    <label>Insta ID</label>
    <input type="text" style="color:black" name="insta" placeholder="Insta ID" required="">

</div>



<div style="padding: 15px;">
    <input type="submit" class="btn btn-success">
  </div>

  <div align="center" style="padding: 70px;">

      <table>

          <tr style="background-color:antiquewhite;" align="center">
              <th style="padding:10px; font-size: 20px; color:black;">Name</th>
              <th style="padding:10px; font-size: 20px; color:black;">Speciality</th>
              <th style="padding:10px; font-size: 20px; color:black;">Image</th>
              <th style="padding:10px; font-size: 20px; color:black;">FB</th>
              <th style="padding:10px; font-size: 20px; color:black;">Tweeter</th>
              <th style="padding:10px; font-size: 20px; color:black;">Insta</th>
              <th style="padding:10px; font-size: 20px; color:black;">Action</th>
          </tr>

          @foreach($data as $foodchefs)
          <tr style="background-color:black;" align="center">

              <th style="padding:10px; font-size: 20px; color:white;">{{$foodchefs->name}}</th>
              <th style="padding:10px; font-size: 20px; color:white;">{{$foodchefs->speciality}}</th>
              <th><img height="100px" width="100px" src="foodchefsimage/{{$foodchefs->image}}" alt=""></th>
              <th style="padding:10px; font-size: 20px; color:white;">{{$foodchefs->fb}}</th>
              <th style="padding:10px; font-size: 20px; color:white;">{{$foodchefs->tweeter}}</th>
              <th style="padding:10px; font-size: 20px; color:white;">{{$foodchefs->insta}}</th>
              <th><a class="bt btn-danger" onclick="return confirm('are you sure to Delete this foodchefs?')" style="color: red; font-size: 20px; " href="{{url('deletechefs',$foodchefs->id)}}">Delete
                      </tr>
                      @endforeach
                  </table>

              </div>

<!-- partial -->
  @include('admin.script')
  <style>
	img {
  border-radius: 50px;
}
</style>
</body>
</html>
