<!DOCTYPE html>
<html lang="en">
    <base href="/public">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    @include('style')

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('redirects')}}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="{{url('redirects')}}">About</a></li>
                            <li class="scroll-to-section"><a href="{{url('redirects')}}">Menu</a></li>
                            <li class="scroll-to-section"><a href="{{url('redirects')}}">Chefs</a></li>
                            <li class="scroll-to-section"><a href="redirects">Contact Us</a></li>

                            <li>
                        @if (Route::has('login'))
                            @auth
                            <li class="scroll-to-section" style="background-color: rgb(14, 177, 241);">
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                Cart{{$count}}
                            </a></li>
                            <x-app-layout>
                            </x-app-layout>
                            @else
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                @endif
                            @endauth
                            @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->
    <div class="container-fluid page-body">
        @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
      </div>
      @endif


<div align="center" style="padding: 100px;">
	<table>
        <form action= "{{url('orderconfirm')}}" method="post">

		<tr style="background-color:antiquewhite;" align="center">
			<td style="padding:10px; font-size: 20px; color:black;">Food Name</td>
			<td style="padding:10px; font-size: 20px; color:black;">MRP</td>
            <td style="padding:10px; font-size: 20px; color:black;">Qty</td>
            <td style="padding:10px; font-size: 20px; color:black;">Price</td>
			<td colspan="2" style="padding:10px; font-size: 20px; color:black;">Delete Item</td>
		</tr>
        @foreach($data as $data)
        @csrf
        <tr><td colspan="7" align="center" hidden>$total=0</td></tr>
        <tr><td colspan="7" align="center"></td></tr><tr><td colspan="7" align="center"></td></tr>
            <tr align="center">
			<td  color:black;"><input type="text" name="foodname[]"value=" {{$data->title}}"hidden="">{{$data->title}}</td>
			<td  color:black;"><input type="text" name="price[]"value=" {{$data->price}}"hidden="">{{$data->price}}</td>
			<td  color:black;"><input type="text" name="qty[]"value=" {{$data->qty}}"hidden="">{{$data->qty}}</td>
			<td  color:black;"><input type="text" name="total[]"value=" {{$data->qty * $data->price}}" hidden="">{{$data->qty * $data->price}}</td>

                <td><a class="bt btn-danger"  onclick="return confirm('are you sure to Delete record from Cart List?')" href="{{url('/deletecart',$data->id)}}">Delete</td></tr>
		<tr><td colspan="7" align="center"></td></tr>
			</tr>
		@endforeach
        <tr style="background-color:antiquewhite;" align="center"><td colspan="3" align="center"  color:black;">Total</td>
            <td colspan="3" align="center"  color:black;">$total</td></tr>
        </table>

        <div align="center" style="padding: 10px;">
            <button id="order" type="button" class="btn btn-primary">Order Now</button>
        </div>

            @foreach($data as $users)
        @csrf
        <div id="appear" align="center" style="padding: 10px; display:none;">
        <div><label>Name</label><input type="text" style="color:black" name="name" value="{{$user->name}}" required=""></div>
        <div><label>Phone</label><input type="number" style="color:black" name="phone" value="{{$user->phone}}" required=""></div>
        <div><label>Address</label><input type="text" style="color:black" name="address" value="{{$user->address}}" required=""></div>

        <div align="center" style="padding: 10px;">
            <button id = "submit" class="btn btn-success" type="submit">Order Confirm</button>
            <button id ="close" type ="button" class="btn btn-danger">Close</button>
        </div>
        </div>
        @endforeach
        </form>
    <!-- ***** Footer Start ***** -->


    <!-- jQuery -->
    <script>
        $("#order").click(
            function()
            {
                $("#appear").show();
            }
        );
        $("#close").click(
            function()
            {
                $("#appear").hide();
            }
        );
    </script>
  @include('script')
  </body>
</html>
