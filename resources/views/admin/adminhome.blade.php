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
          <a href="redirects">Pages</a> &raquo;

        </nav>
      </div>


<!-- partial -->
  @include('admin.script')

</body>
</html>
