<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/backend') }}/img/favicon/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/home') }}/css/style.css" />

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>uPrint</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiar">
      <div class="container">
        <a class="navbar-brand text-black header" href="#home"
          ><h1>uPrint<span class="text-danger">.</span></h1></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-ul text-center">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pricing">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#policy">Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('student.LoginPage') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('student.RegistrationPage') }}">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section id="home" class="upload_body">
      <div class="container-fluid ">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 text-center">
            <!-- added text-center class -->
            <img
              class="img-responsive w-75 img-fluid"
              src="{{ asset('assets/frontend/home') }}/img/Uploading-amico.png"
              alt=""
            />
          </div>
          <div
            class="col-lg-6 col-md-6 col-sm-12 text-center upload_body-right">
            <h1>A Simple Solution to Print Your Documents</h1>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h1 class=" text-center ">ABOUT US</h1>
            @foreach ($info as $item)
            <p class="pt-3 text-center">{{ $item->about_us }}</p>
            @endforeach
          </div>
        </div>
      </div>
    </section>


    <section id="pricing" class="pricing-content section-padding py-5">
      <div class="container">
        <div class="section-title text-center">
          <h1>PRICING PLANS</h1>
        </div>
        <div class="row text-center">
        <!--- END COL -->
          <div class="col-lg-6 col-sm-6 col-sm-12 col-xs-12 wow fadeInUp pb-5" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="pricing_design">
              <div class="single-pricing">
                <div class="price-head">
                  <h2>Black & White </h2>
                  <h1 class="price">৳5</h1>
                  <b>/Page</b>
                </div>
                <div class="pricing-price">

                </div>
                <a href="#" class="price_btn">Order Now</a>
              </div>
            </div>
          </div>


          <div class="col-lg-6 col-sm-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="pricing_design">
              <div class="single-pricing">
                <div class="price-head">
                  <h2>Color </h2>
                  <h1 class="price">৳10</h1>
                  <b>/Page</b>
                </div>
                <div class="pricing-price">

                </div>
                <a href="#" class="price_btn">Order Now</a>
              </div>
            </div>
          </div>


        </div><!--- END ROW -->
      </div><!--- END CONTAINER -->
    </section>


    <section id="policy" class="about pt-5 pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h1 class=" text-center ">OUR POLICY</h1>
            @foreach ($info as $item)
            <p class="pt-3 text-center">{{ $item->our_policy }}</p>
    @endforeach
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container-fluid ">
        <div class="row">
          <h1 class="text-center">CONTACT US</h1>
          <div
            class="col-lg-6 col-md-6 col-sm-12 text-center upload_body-right">
            <img class="img-responsive w-75 img-fluid"  src="{{ asset('assets/frontend/home') }}/img/Contact.png" alt="" />
          </div>
          <div
            class="col-lg-6 col-md-6 col-sm-12 upload_body-right">
            <div class="contact-main">
              <div class="con-form">
                <form action="#">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                      class="form-control" name=""  aria-describedby="helpId" placeholder="Enter your name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"
                      class="form-control" name=""  aria-describedby="helpId" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text"
                      class="form-control" name=""  aria-describedby="helpId" placeholder=Subject>
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="" cols="30" rows="4" placeholder="Message" class="form-control"></textarea>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-danger mt-2 btn">Submit</button>
                  </div>

                </form>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 bg-dark py-1 text-white text-center">
            Powered by : UGV-Department of Computer Science and Engineering ® 2023
          </div>
        </div>
      </div>
    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>
