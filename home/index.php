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
                    <h2>We are honoured to have you doing the inauguration!</h2>
                    <hr width="300">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="card mb-6">
                            <div id="ytplayer"></div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Load the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // Replace the 'ytplayer' element with an <iframe> and
        // YouTube player after the API code downloads.
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('ytplayer', {
                height: '400',
                width: '100%',
                videoId: 'HGRlV066thg',
                playerVars: {
                    'autoplay': 0,
                    'controls': 0,
                    'rel' : 0,
                    'fs' : 0,
                },
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                $('#pharma-modal').modal('show');
            }
        }
        $(document).ready(function (){
            $('#pharma-form').validate({
                rules:{

                },
                submitHandler: function (){
                    let form = $('#pharma-form').serialize();
                    $.ajax({
                        url: 'pharma-form-submit.php',
                        type: "post",
                        data: form,
                        success: function (res){
                            let data = JSON.parse(res);
                            if (data.status === true){
                                $('#pharma-form')[0].reset();
                                swal("Success!", "Your details has been submitted successfully!", "success");
                                $('#pharma-modal').modal('hide');
                            }else{
                                swal("Opps!", "Something went wrong please try again!", "error");
                            }
                        },
                        error: function (){
                            swal("Opps!", "Something went wrong please try again!", "error");
                        }
                    })
                }
            });
        });
    </script>

<?php include '../assets/layouts/footer.php' ?>