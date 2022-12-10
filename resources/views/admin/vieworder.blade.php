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
          <a href="redirects">Customer Orders</a> &raquo;

        </nav>
      </div>

      <div align="center" style="padding: 70px;">

        <table>

            <tr style="background-color:antiquewhite;" align="center">
                <th style="padding:10px; font-size: 20px; color:black;">Name</th>
                <th style="padding:10px; font-size: 20px; color:black;">Phone</th>
                <th style="padding:10px; font-size: 20px; color:black;">Address</th>
                <th style="padding:10px; font-size: 20px; color:black;">Food Name</th>
                <th style="padding:10px; font-size: 20px; color:black;">Price</th>
                <th style="padding:10px; font-size: 20px; color:black;">Quantity</th>
                <th style="padding:10px; font-size: 20px; color:black;">Total Price</th>
                <th colspan="2" style="padding:10px; font-size: 20px; color:black;">Order Confirm/Cancel</th>
            </tr>

            @foreach($data as $order)
            <tr style="background-color:black;" align="center">
                @csrf
                <th style="padding:10px; color:white;">{{$order->name}}</th>
                <th style="padding:10px; color:white;">{{$order->phone}}</th>
                <th style="padding:10px; color:white;">{{$order->address}}</th>
                <th style="padding:10px; color:white;">{{$order->foodname}}</th>
                <th style="padding:10px; color:white;">{{$order->price}}</th>
                <th style="padding:10px; color:white;">{{$order->qty}}</th>
                <th style="padding:10px; color:white;">{{$order->price * $order->qty}}</th>

                <th><a class="bt btn-success" onclick="return confirm('are you sure to Admin Rights?')" style="color: green;" href="{{url('approved',$order->id)}}">Confirm/
                    <a class="bt btn-primary" onclick="return confirm('are you sure to Admin Rights?')" style="color: hsl(199, 86%, 49%);" href="{{url('remove',$order->id)}}">Order Cancel</th>
                        </tr>
                        @endforeach
                    </table>

                </div>



<!-- partial -->
  @include('admin.script')

</body>
</html>
