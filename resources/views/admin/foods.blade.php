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
              <a href="/food/profile">
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
          <a href="{{url('/foods')}}">Foods</a> &raquo;

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
      <form action="{{url('/foodmenu')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div style="padding: 15px;">
          <label>Recipe Name</label>
          <input type="text" style="color:black" name="title" placeholder="Recipe Name" required="">

    </div>

    <div style="padding: 15px;">
        <label>Recipe Image</label>
        <input type="file" name="image" required>
        <div id="image-holder"></div>

  </div>

    <div style="padding: 15px;">
          <label>Price</label>
          <input type="number" style="color:black" name="price" placeholder="price" required="">

    </div>
    <div style="padding: 15px;">
        <label>Description</label>
        <input type="text" style="color:black" name="description" placeholder="Description" required="">

  </div>



    <div style="padding: 15px;">
          <input type="submit" class="btn btn-success">
        </div>

        <div align="center" style="padding: 70px;">

            <table>

                <tr style="background-color:antiquewhite;" align="center">
                    <th style="padding:10px; font-size: 20px; color:black;">Title</th>
                    <th style="padding:10px; font-size: 20px; color:black;">Price</th>
                    <th style="padding:10px; font-size: 20px; color:black;">Description</th>
                    <th style="padding:10px; font-size: 20px; color:black;">Image</th>
                    <th style="padding:10px; font-size: 20px; color:black;">Action</th>
                </tr>

                <tr style="background-color:black;" align="center">

                    <th style="padding:10px; font-size: 20px; color:white;"></th>
                    <th style="padding:10px; font-size: 20px; color:white;"></th>
                    <th style="padding:10px; font-size: 20px; color:white;"></th>
                    <th><img height="100px" width="100px" src="foodimage/{{$food->image}}" alt=""></th>
                    <th><a class="bt btn-danger" onclick="return confirm('are you sure to Delete this food?')" style="color: red; font-size: 20px; " href="{{url('deletefood',$food->id)}}">Delete
                            </tr>
                            @endforeach
                        </table>

                    </div>


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
