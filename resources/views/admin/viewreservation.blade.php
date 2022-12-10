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
          <a href="{{url('/reservation')}}">Reservation</a> &raquo;

        </nav>
      </div>


    </div>
  </section>

  <div align="center" style="padding: 100px;">
	<table>

		<tr style="background-color:antiquewhite;" align="center">
			<th style="padding:10px; font-size: 20px; color:black;">Name</th>
			<th style="padding:10px; font-size: 20px; color:black;">Email</th>
			<th style="padding:10px; font-size: 20px; color:black;">Phone</th>
			<th style="padding:10px; font-size: 20px; color:black;">Guest</th>
			<th style="padding:10px; font-size: 20px; color:black;">Date</th>
            <th style="padding:10px; font-size: 20px; color:black;">Time</th>
            <th style="padding:10px; font-size: 20px; color:black;">Message</th>
            <th style="padding:10px; font-size: 20px; color:black;">Status</th><th></th><th></th>

			<th colspan="3" style="padding:10px; font-size: 20px; color:black;">Action</th>
		</tr>

		@foreach($reservation as $reservation)
		<tr style="background-color:black;" align="center">

			<th style="padding:10px; color:white;">{{$reservation->name}}</th>
            <th style="padding:10px; color:white;">{{$reservation->email}}</th>
			<th style="padding:10px; color:white;">{{$reservation->phone}}</th>
			<th style="padding:10px; color:white;">{{$reservation->guest}}</th>
			<th style="padding:10px; color:white;">{{$reservation->date}}</th>
            <th style="padding:10px; color:white;">{{$reservation->time}}</th>
            <th style="padding:10px; color:white;">{{$reservation->message}}</th>
            <th style="padding:10px; color:white;">{{$reservation->status}}</th>
			<th><a class="bt btn-primary" onclick="return confirm('are you sure to Approved this?')" href="{{url('approvreserve',$reservation->id)}}">Approved</th><th>|</th>
				<th><a class="bt btn-danger" onclick="return confirm('are you sure to reject this?')" href="{{url('rejectreserve',$reservation->id)}}">Reject</th><th>|</th>
		</tr>
		<tr><th colspan="7" align="center"></th></tr>
		@endforeach

	</table>

</div>
<!-- partial -->
  @include('admin.script')

</body>
</html>
