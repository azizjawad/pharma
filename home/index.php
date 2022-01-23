<?php
define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();
?>
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                    <img class="mr-3" src="../assets/images/logonotextwhite.png" alt="" width="48" height="48">
                    <div class="lh-100">
                        <h6 class="mb-0 text-white lh-100">Hey <?php echo $_SESSION['first_name'] .' ' .$_SESSION['last_name']; ?></h6>
                        <small>Last logged in at <?php echo date("m-d-Y", strtotime($_SESSION['last_login_at'])); ?></small>
                    </div>
                </div>
                <br>
                <div class="text-center text-muted mb-5">
                    <h2>Lorem Impsum is simply a dummy text</h2>
                    <hr width="300">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="card mb-6">
                            <video style="object-fit: cover" controlsList="nodownload" id="myVideo" width="100%" height="400" controls>
                                <source src="../assets/uploads/senziryl.mp4" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                            <!--                        <img class="card-img-top" src='../assets/images/repo_gitklik.png' alt="Card image cap">-->

                            <!--                        <div class="card-body">-->
                            <!--                            <p class="card-text">Version Control application in Laravel using Git for core operationality.</p>-->
                            <!--                            <div class="d-flex justify-content-between align-items-center">-->
                            <!--                                <div class="btn-group">-->
                            <!--                                    <a href="https://github.com/msaad1999/GitKLiK" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>-->
                            <!--                                    <a href="https://github.com/msaad1999/GitKLiK/archive/master.zip" class="btn btn-sm btn-outline-secondary" target="_blank">Download</a>-->
                            <!--                                </div>-->
                            <!--                                <small class="text-muted">[under development]</small>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="modal fade" id="pharma-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Give us your details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="pharma-form-submit.php" id="pharma-form" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <select required class="form-control" name="title" id="title">
                                    <option value="">Please select</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Sir">Sir</option>
                                    <option value="Prof">Prof</option>
                                    <option value="Dean">Dean</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" required class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="clinic_name">Clinic Name</label>
                                <input type="text" required class="form-control" name="clinic_name" id="clinic_name" placeholder="Clinic Name">
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select required class="form-control" name="state" id="state">
                                    <option value="">Please select</option>
                                    <option value="AN">Andaman and Nicobar Islands</option>
                                    <option value="AP">Andhra Pradesh</option>
                                    <option value="AR">Arunachal Pradesh</option>
                                    <option value="AS">Assam</option>
                                    <option value="BR">Bihar</option>
                                    <option value="CH">Chandigarh</option>
                                    <option value="CT">Chhattisgarh</option>
                                    <option value="DN">Dadra and Nagar Haveli</option>
                                    <option value="DD">Daman and Diu</option>
                                    <option value="DL">Delhi</option>
                                    <option value="GA">Goa</option>
                                    <option value="GJ">Gujarat</option>
                                    <option value="HR">Haryana</option>
                                    <option value="HP">Himachal Pradesh</option>
                                    <option value="JK">Jammu and Kashmir</option>
                                    <option value="JH">Jharkhand</option>
                                    <option value="KA">Karnataka</option>
                                    <option value="KL">Kerala</option>
                                    <option value="LA">Ladakh</option>
                                    <option value="LD">Lakshadweep</option>
                                    <option value="MP">Madhya Pradesh</option>
                                    <option value="MH">Maharashtra</option>
                                    <option value="MN">Manipur</option>
                                    <option value="ML">Meghalaya</option>
                                    <option value="MZ">Mizoram</option>
                                    <option value="NL">Nagaland</option>
                                    <option value="OR">Odisha</option>
                                    <option value="PY">Puducherry</option>
                                    <option value="PB">Punjab</option>
                                    <option value="RJ">Rajasthan</option>
                                    <option value="SK">Sikkim</option>
                                    <option value="TN">Tamil Nadu</option>
                                    <option value="TG">Telangana</option>
                                    <option value="TR">Tripura</option>
                                    <option value="UP">Uttar Pradesh</option>
                                    <option value="UT">Uttarakhand</option>
                                    <option value="WB">West Bengal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile (optional)">
                            </div>
                            <div class="form-group">
                                <label for="clinic_name">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email (optional)">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        var vid = document.getElementById("myVideo");
        console.log($('#pharma-form'));
        vid.onended = function() {
            $('#pharma-modal').modal('show');
        };

        $(document).ready(function (){
            $('#pharma-form').validate();
        })
    </script>
<?php include '../assets/layouts/footer.php' ?>