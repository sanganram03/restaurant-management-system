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
              <a href="/user/profile">
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
          <a href="{{url('/users')}}">Users</a> &raquo;

        </nav>
      </div>


    </div>
  </section>


  <div align="center" style="padding: 70px;">

    <table>

        <tr style="background-color:antiquewhite;" align="center">
            <th style="padding:10px; font-size: 20px; color:black;">Name</th>
            <th style="padding:10px; font-size: 20px; color:black;">Email</th>
            <th style="padding:10px; font-size: 20px; color:black;">User Type</th>
            <th style="padding:10px; font-size: 20px; color:black;">Edit User Type</th>
            <th style="padding:10px; font-size: 20px; color:black;">Action</th>
        </tr>

        @foreach($data as $user)
        <tr style="background-color:black;" align="center">

            <th style="padding:10px; color:white;">{{$user->name}}</th>
            <th style="padding:10px; color:white;">{{$user->email}}</th>
            <th style="padding:10px; color:white;">{{$user->usertype}}</th>
            <th><a class="bt btn-success" onclick="return confirm('are you sure to Admin Rights?')" style="color: green;" href="{{url('approved',$user->id)}}">Admin Rights/
                <a class="bt btn-primary" onclick="return confirm('are you sure to Admin Rights?')" style="color: hsl(199, 86%, 49%);" href="{{url('remove',$user->id)}}">User Rights</th>
<th><a class="bt btn-danger" onclick="return confirm('are you sure to Delete this User?')" style="color: red;"  href="{{url('delete',$user->id)}}">Delete
                    </tr>
                    @endforeach
                </table>

            </div>

<!-- partial -->
  @include('admin.script')

</body>
</html>
