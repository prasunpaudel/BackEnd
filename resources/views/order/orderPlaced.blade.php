@extends('pages.template')
@section('content')
<section class="vh-100" style="background-color: #8c9eff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-stepper text-black" style="border-radius: 16px;">
          <div class="row d-flex justify-content-center align-items-center capatalize h-100">
           <h1><strong> The Order is Being Processed </strong></h1>
          </div>
            <div class="card-body p-5">
  
              <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                  <h5 class="mb-0">INVOICE <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
                </div>
                <div class="text-end">
                  <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                  <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                </div>
              </div>
              <div class="progress">
                <!-- Add a progress bar with each step -->
                <div class="progress-bar step1" role="progressbar">step-1</div>
                <div class="progress-bar step2" role="progressbar">step-2</div>
                <div class="progress-bar step3" role="progressbar"></div>
                <div class="progress-bar step4" role="progressbar"></div>
            </div>
            
              <div class="d-flex justify-content-between">
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Processed</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Shipped</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">En Route</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Arrived</p>
                  </div>
                </div>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      // Update the progress bar's width based on the current step
      function updateProgressBar(currentStep) {
          var progressBar = document.querySelectorAll('.progress-bar');
          for (var i = 0; i < progressBar.length; i++) {
              if (i < currentStep) {
                  progressBar[i].style.width = '25%'; // Each step takes 25% width
                  progressBar[i].classList.add('bg-success');
              } else if (i === currentStep) {
                  progressBar[i].style.width = '0%'; // The current step starts at 0% width
                  progressBar[i].classList.remove('bg-success');
              } else {
                  progressBar[i].style.width = '0%'; // Incomplete steps have 0% width
                  progressBar[i].classList.remove('bg-success');
              }
          }
      }
  
      // Call the updateProgressBar function with the desired step (0, 1, 2, or 3)
      updateProgressBar(1); // Starts the progress bar at 0%
  </script>
  </section>
@stop