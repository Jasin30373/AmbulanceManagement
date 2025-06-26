<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ambulance Management System</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Ambulance Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                    @endauth
            @endif
        </ul>
            <a href="{{ route('appointments.create') }}" class="btn btn-primary ml-lg-3">Make an Appointment</a>
        </div>
          </div>
</nav>

<section class="jumbotron text-center text-white mb-0" id="home" style="background: linear-gradient(rgba(0,123,255,0.7), rgba(0,123,255,0.7)), url('/assets/img/slide/slide-1.jpg') center/cover no-repeat;">
    <div class="container py-5">
        <h1 class="display-3 font-weight-bold mb-3">Welcome to the Ambulance Management System</h1>
        <p class="lead mb-4">Efficient, reliable, and fast ambulance services at your fingertips.</p>
        <a href="#contact" class="btn btn-light btn-lg mt-3 shadow-lg animate__animated animate__pulse animate__infinite">Need Help?</a>
    </div>
</section>

<section class="container py-5" id="about">
        <div class="row">
        <div class="col-md-6">
            <h2>About Us</h2>
            <p>Our Ambulance Management System is dedicated to providing quick and reliable emergency medical services. We ensure that help is just a click away, 24/7.</p>
        </div>
        <div class="col-md-6">
            <img src="/assets/img/about.jpg" class="img-fluid rounded" alt="About Ambulance Management">
        </div>
      </div>
</section>

<section class="bg-light py-5" id="services">
    <div class="container">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <span class="display-4 text-primary"><i class="fas fa-ambulance"></i></span>
                        <h5 class="card-title mt-3">24/7 Emergency</h5>
                        <p class="card-text">Immediate response to all emergency calls, any time of day.</p>
          </div>
        </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <span class="display-4 text-primary"><i class="fas fa-user-md"></i></span>
                        <h5 class="card-title mt-3">Qualified Staff</h5>
                        <p class="card-text">Our team consists of highly trained medical professionals.</p>
            </div>
          </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <span class="display-4 text-primary"><i class="fas fa-phone-volume"></i></span>
                        <h5 class="card-title mt-3">Easy Booking</h5>
                        <p class="card-text">Book an ambulance quickly through our online system.</p>
            </div>
          </div>
            </div>
        </div>
      </div>
</section>

<!-- Why Choose Us Section -->
<section class="container py-5" id="why-choose-us">
    <h2 class="text-center mb-4">Why Choose Us?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-ambulance fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Fast Response</h5>
                    <p class="card-text">Our ambulances are dispatched within minutes, ensuring you get help when you need it most.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-user-md fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Expert Staff</h5>
                    <p class="card-text">Our team is made up of highly trained medical professionals ready to assist you 24/7.</p>
              </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-phone-volume fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Easy Booking</h5>
                    <p class="card-text">Book an ambulance quickly and easily through our online system or by phone.</p>
            </div>
            </div>
        </div>
      </div>
</section>

<section class="container py-5" id="contact">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4"><i class="fas fa-headset text-primary mr-2"></i>Contact Us</h2>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0 text-center">
                            <i class="fas fa-phone fa-2x text-success mb-2"></i>
                            <div><strong>Call us:</strong> +389 71 548 831</div>
      </div>
                        <div class="col-md-6 text-center">
                            <i class="fas fa-map-marker-alt fa-2x text-danger mb-2"></i>
                            <div><strong>Location:</strong> Skopje, North Macedonia</div>
                </div>
              </div>
                    <div class="text-center">
                        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg"><i class="fas fa-calendar-plus mr-2"></i>Make an Appointment</a>
                </div>
              </div>
        </div>
      </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        <small>&copy; {{ date('Y') }} Ambulance Management System. All rights reserved.</small>
    </div>
</footer>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
// Smooth scroll for anchor links
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
</script>
</body>
</html>