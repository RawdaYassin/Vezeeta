

<html>
    <head>

<style>

.body{background: #f5f5f5}
.rounded{border-radius: 1rem}
.nav-pills .nav-link{color: #555}
.nav-pills .nav-link.active{color: white}
input[type="radio"]{margin-right: 5px}
.bold{font-weight:bold}
</style>
<script>

$(function() {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>


    </head>
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Payment Info </a> </li>
                             </ul>
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form  action = '../Controllers/payment.php'>
                            
                                <div class="form-group"> 
                                        <h6>Card Owner</h6>
                                 <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                               <div class="form-group"> <label for="appointment_id">
                                        <h6>Appointment ID</h6>
                                     <input type="text" name="appointment_id" placeholder="Appointment ID (Completed only)" required class="form-control "> </div>
                                
                                    <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                             
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> 
                                                    <h6>Expiration Date</h6>
                                                </span>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" required class="form-control"> </div>
                                    </div>
                                </div>
                                 <button name = "confirm_payment" type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                            
                        </div>
                    </div> <!-- End -->
                   
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>


    </html>