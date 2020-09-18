<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>H.R</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="/svg/test.png" />
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <style>
    #done{
      background-color: green;
      color:white; 
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left d-flex">
      <a href="/home"><img src="/svg/test.png" alt="" class="img-fluid" style="height: 90px;width:100px;"></a>
      <h5 class="text-light mt-2"><a href="/home"><span style ="color:white;">Leave Management</span></a></h5>
        <!-- Uncomment below if you prefer to use an image logo -->
         
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class=""><a href="/home">Home</a></li>
          <li><a href="#"> {{ Auth::user()->name }}</a></li>
          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              <button class="btn btn-danger btn-md p-2">Log Out</button>
                    @csrf 
            </form>
          </li>
          
        </ul>
        
      </nav><!-- .nav-menu -->

    </div>
  </header>



  <main id="main">
  
  <!----Dashboard Section
  <section class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="icofont-simple-smile" style="color: #20b38e;"></i>
              <span data-toggle="counter-up">232</span>
              <p></p>
              <p>Total Leads</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-document-folder" style="color: #c042ff;"></i>
              <span data-toggle="counter-up">521</span>
              <p> Total Tasks</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-live-support" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up">1,463</span>
              <p>Completed Leads</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
              <span data-toggle="counter-up">15</span>
              <p>In-progress</p>
            </div>
          </div>

        </div>

      </div>
    </section>

  End Dashboard Section--->

    <!-- ======= About Us Section --->

  @include('layouts.messages')
    <section id="about" class="about">
    <a href="/employees" class="btn btn-primary offset-2 mb-2">Back</a>
      <div class="container">
      
        <div class="row no-gutters">
          <div class="col-lg-6 video-box mt-5"> 
          <div class="">
                <h5 class="text-success"><strong>Employee Details</strong></h5>
              <h4 class="text-primary"><strong>{{$user->name}}</strong></h4>
              <p><strong>Email</strong>: {{$user->email}}</p>
            </div>

            <div class="" data-aos="fade-up" data-aos-delay="100">
              <h4 class="title text-primary"></h4>
              <p class="description">Designation: {{$user->designation}}</p>
            </div>

            <div class="" data-aos="fade-up" data-aos-delay="100">
           
              <h4 class="title text-danger"><h4 class="text-danger"></h4></h4>
              <p class="description">Department:</p>
            </div>

           <div class="" data-aos="fade-up" data-aos-delay="100">
           
              <h4 class="title text-danger"><h4 class="text-danger"></h4></h4>
              <p class="description">Laeve Applications: {{$user->applications->count()}}</p>
            </div>
          </div>

          <div class="col-lg-6 mt-5 d-flex">

            <div class="col-lg-4">
              <div class="">
                  <h5 class="text-success"><strong>More</strong></h5>
                  <h4 class="text-primary"><strong></strong></h4>
              </div>

              <div class="" data-aos="fade-up" data-aos-delay="100">
                <h4 class="title text-primary"></h4>
                
              </div>
            
              <div class="" data-aos="fade-up" data-aos-delay="100">
                <h4 class="title text-primary"></h4>
                <p class="description">Supervisor: <p><strong class="text-primary">{{$manager->name ?? "Not Allocated"}}</strong></p> </p>
                <p class="description"> <h4><strong class="text-primary"></strong></h4> </p>
              </div>
            </div>

            <div class="col-lg-2">
                <a href="#AssignSupervisor" data-target="#AssignSupervisor" data-toggle="modal" class=" mt-3 btn btn-primary btn-sm" style="color: white;">Assign Supervisor</a>
            </div>


           

          </div>
        </div>

      </div>
    </section>

     <!---Modal--->
     <div class="modal fade" id="AssignSupervisor" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Choose Supervisor</h4>
                </div>
                <div class="modal-body">
                    <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/assign/{{$user->id}}/" method="POST">
                    @csrf

                        <div class="form-group">
                            <label for="type" class="col-sm-12 control-label">Supervisor</label>

                            <div class="col-sm-12">
                                   <select class="form-control" name="supervisor" id="supervisor"required>
                                    <option value="">choose</option>
                                    @foreach($admins->where('type','admin') as $admin)
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                    @endforeach
                                   </select>
                            </div>
                        </div>


                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Assign
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!---Modal--->
  
    <!---Tasks--->
   
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
            
          <div class="col-lg-12 d-flex flex-column justify-content-center about-content">

            <div class=" mb-2">
                <div class="d-flex justify-content-between">
                  <h2><strong class="text-muted">More</strong></h2>
                </div>
            </div>
          
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">  
               <p></p>
            </div>

            <table class="text-muted responsive">
                <thead>
                    <tr>
                    <th scope="col">Start Date </th>
                    <th scope="col">End Date </th>
                    </tr>
                </thead>
              
                <tbody class= "text-muted">
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                </tbody>
            </table>
            
            <table class="mt-3 text-muted responsive">
                <thead>
                    <tr>
                    <th scope="col">Applicant Notes </th>
                    </tr>
                </thead>
              
                <tbody class= "text-muted">
                    <tr>
                      <td></td>
                    </tr>
                </tbody>
            </table>

            <table class="mt-3 text-muted responsive">
                <thead>
                    <tr>
                    <th scope="col">Decision Notes </th>
                    </tr>
                </thead>
              
                <tbody class= "text-muted">
                    <tr>
                      <td></td>
                    </tr>
                </tbody>
            </table>
      
          </div>
        </div>

      </div>
    </section>
    
    <!--End About Us Section -->

    <!-- ======= About Lists Section 
    <section class="about-lists">
      <div class="container">
      <h3 class="text-center pb-3">Red Heart Product List</h3>
        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
          <span></span>
            <h4>Pocket Cash</h4>
            <p>A safer way for Learners to carry pocket money to school</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <span></span>
            <h4>Digital Red Heart MapTech E-Chip</h4>
            <p>Asset tracking and tracing device in real time</p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
            <span></span>
            <h4>Digital Red Heart V Tech</h4>
            <p>Track and tracing device for the transportation industry, e.g Courier companies, Taxi Industry e.t.c </p>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
            <span></span>
            <h4>Digital Red Heart Emergency Tool</h4>
            <ul>
            <li><p>Track and tracing of Human capital in real time</p></li>
            <li><p>Track and tracing Life stock track in real time</p></li>
            <li><p>Track and tracing of learners in real time</p></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
            <span></span>
            <h4>Corporate Red Heart emergency access Card </h4>
            <ul>
            <li><p>Security Companies</p></li>
            <li><p>Construction Companies</p></li>
            <li><p>Public Servants</p></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
            <span></span>
            <h4>Added Feature </h4>
            <p>Please note that our Red Heart Emergency tool can be customized per Industry</p>
          </div>
        </div>

      </div>
    </section>
    
    End About Lists Section -->

    <!-- ======= 
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"><i class="icofont-computer"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="icofont-chart-bar-graph"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="icofont-earth"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="icofont-image"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="icofont-settings"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
            <div class="icon"><i class="icofont-tasks-alt"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>
    </section>

    ======= -->

    <!--
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-title">
          <h2>Product List Continued</h2>
          <p>Red Heart is delivered through these devices.</p>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Pocket Cash</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/back.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-eye"></i></a>
                  <a href="/pocketcash" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/added.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart MapTech E-Chip</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/added.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-eye"></i></a>
                  <a href="/asset" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/vtech.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart V-Tech</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/vtech.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-eye"></i></a>
                  <a href="vtech" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Digital Red Heart Emergency Tool</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/pocket.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-eye"></i></a>
                  <a href="emergency" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/cooperateView.jpg" class="img-fluid" alt="" >
              <div class="portfolio-info">
                <h4>Corporate Red Heart emergency access Card </h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/cooperate.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-eye"></i></a>
                  <a href="/cooperate" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/pocket.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Custom Red Heart</h4>
                
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/pocket.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-eye"></i></a>
                  <a href="#" title="More Details"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    
     End Our Portfolio Section -->

    <!-- ======= Our Team Section ======= -->

    <!-- =======
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item" data-aos="fade-up">
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="500">
            <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section><  -->

   

    <!-- ======= ======= -->
   
   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
           
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            
          </div>
          
          <div class="col-lg-4 col-md-6 footer-newsletter">
           

          </div>
          
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Jay Mutanga</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      
        Leave Management by <a href="#">Jay Mutanga</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>