<?php session_start();
    if (!isset($_SESSION['redirect'])) {
        $_SESSION['redirect'] = 'restaurants.php';
    }
    if(!isset($_SESSION['login'])) {
        $_SESSION['login'] = 'false';

    }
    //echo $_SESSION['login'];
    //echo(($_SESSION['login']));
    
?>

<!-- Done except for login modal + user session info -->
<!-- session redirect = this.href-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | RestaurantHub </title>
        <link href="test.css" rel="stylesheet" type="text/css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap-4.4.1.js"></script>
    </head>


<script>
    var goTo = 'restaurants.php';
    $(document).ready(function(){
        
        //Signup redirect
        $("#reg_form").submit(function(event){
            event.preventDefault();
            var formValues= $(this).serialize();
    
            $.ajax({
                type: "POST",
                url: "UserRegistration.php",
                data: formValues
                }).done(function(redirect) {
                    alert(redirect);
                    location.href = goTo;

                });
            });
        
            
        
        
        //Restaurant card redirect
        $("a:has(.card)").click((function(event) {
            event.preventDefault();
            goTo = $(this).attr('href');
            $.ajax({
                type: "POST",
                url: "loginprocessing.php",
                data: {goTo: goTo}
                }).done(function(redirect) {
                    $("#start").click();
            });
        }));

        $("#login_form").submit(function(event){
            event.preventDefault();
            var formValues= $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "loginprocessing.php",
                data: formValues
                }).done(function(response) {
                    location.href= goTo;

                });
            });
        
    });
</script>

    

    <body>
        <?php if(isset($_SESSION['user'])) { ?>
            <button id="user" class="btn btn-secondary btn-lg"><?php echo $_SESSION['user'] ?></button>
        <?php } ?>
        
    
        <!-- header -->

        <div class="jumbotron text-center">
            
        
            <h1 class="display-4 align-content-center">You want it?</h1>
            <h1 class="display-4 align-content-center">We got it.</h1>
            <p class="lead">Getting food doesn't have to be stressful. 
            Search our offerings from local restaurants you love, 
            then sit back and relax as our team does the legwork for you.</p>
            <hr class="my-4">
            <?php 
            // Button triggers signup modal if not logged in
                if ($_SESSION['login'] == 'false') {

            ?>
                
            
                    <button type="button" id = "start" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Signup"> 
                        Get Started 
                    </button>
            <?php
                }
                // Button redirects to restaurants page if logged in
                else {
            ?>
                    <a href = <?php echo($_SESSION['redirect'])?>> 
                        <button type="button" id = "start" class="btn btn-primary btn-lg"> Get Started </button>
                    </a>
            <?php
                }
            ?>
        </div>

        <!-- Signup Modal -->
        <div class="modal fade" id="Signup" tabindex="-1" role="dialog" aria-labelledby="SignupLabel" aria-hidden="true">
            <form id= "reg_form" class="form-inline" method="POST">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="SignupLabel">Register With Us!</h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                        
                            <div class = "form-group flex-row d-flex justify-content-between">
                                <label col-sm-2 col-form-label>First Name: </label>
                                    <input class="form-control" type="text" name="Fname" required> 
                                
                            </div>

                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>Last Name: </label>
                                <input class="form-control" type="text" name="Lname" required>
                            
                            </div>

                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>Address: </label>
                                <input class="form-control" type="text" name="housing" required>
                            
                            </div>
                            
                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>E-mail: </label>
                                <input class="form-control" type="email" name="email" required>
                            
                            </div>

                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>Phone Number: </label>
                                <input class="form-control" type="int" name="contact" required>
                            
                            </div>

                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>Password:</label>
                                <input class="form-control" type="password" name="Pass1" required>
                            
                            </div>

                            <div class = "form-group flex-row d-flex justify-content-between">
                            <label>Confirm Password: </label>
                                <input class="form-control" type="password" name="Pass2" required>
                            
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                        <button style="margin-right: 180px" type="button" id = "start" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#Login"> 
                        Login 
                        </button>
                            <input id = "reg-submit" class="btn btn-primary" type="submit" name="saveUser" value="Register">
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

        <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">
            <form id= "login_form" class="form-inline" method="POST">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="LoginLabel">Login to your account</h3>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class = "form-group flex-row d-flex justify-content-between">
                                    <label col-sm-2 col-form-label>Email </label>
                                    <input class="form-control" type="email" name="email" required> 
                                    
                            </div>
                            <div class = "form-group flex-row d-flex justify-content-between">
                                    <label col-sm-2 col-form-label>Password </label>
                                    <input class="form-control" type="password" name="password" required> 
                                    
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button style= "margin-right: 180px"type="button" id = "start" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#Signup"> Register </button>
                            <input id = "login-submit" class="btn btn-primary" type="submit" name="saveUser" value="Login">
                        </div>
                        
                         
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
            
        <h2 style = "margin-left: 10px; margin-bottom: 2%">Try our customers' favorite restaurants</h2>

        <div class = "text-center">
            <a href = "store/rest4.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/santoku-sashimi.jpg" alt="Sashimi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Santoku</h5>
                        <p class="card-text"> <span class="badge badge-primary"> Chinese</span> <span class="badge badge-primary"> Japanese</span></p>
                    </div>
                </div> 
            </a>
                
            <a href="store/rest3.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/urban-grill-patatas.jpg" alt="Patatas">
                    <div class="card-body">
                        <h5 class="card-title text-center">Urban Grill</h5>
                        <p class="card-text"> <span class="badge badge-primary"> Spanish</span> <span class="badge badge-primary"> Local</span></p>
                    </div>
                </div> 
            </a>

            <a href = "store/rest7.php">
                <div class="card col-md-4 d-md-inline-block"> <img class="card-img-top" src="images/la-chaumiere-souffle.jpg" alt="Soufflé">
                    <div class="card-body">
                        <h5 class="card-title text-center">La Chaumiere</h5>
                        <p class="card-text"> <span class="badge badge-primary"> French</span><span class="badge badge-primary"> Spanish</span></p>
                    </div>
                </div> 
            </a>

            <br>

            <a class="btn btn-secondary btn-lg" href="restaurants.php" role="button">See All</a>
        </div>
    </body>
</html>

