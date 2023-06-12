<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                        <!-- Profile Edit Form -->
                        <form method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                            <div class="col-md-8 col-lg-9">
                            <img 
                            style="width:100px;height:100px;"
                            src='../../jobExpert/login/images/<?php echo $result['image']; ?>' alt="Profile">
                            <div class="pt-2">
                                <input type="file" name="image"><i class="bi bi-upload"></i>
                            </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">
                                First Name</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="fname" type="text" class="form-control" id="fullName" value="<?php echo $result['fname'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">last Name</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="lname" type="text" class="form-control" id="fullName" value="<?php echo $result['lname'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $result['phonenumber']; ?>"
                            required
                            >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="email" 
                            onchange="check('<?php echo $result['jusername']?>',this.value)"
                            value="<?php echo $result['jusername']; ?>"
                            required
                            >
                            </div>
                        </div>
                        <!-- End Profile Edit Form -->
                        </div>
                        <div class="modal-footer">
                                <button type="submit" name="save"class="btn">Save changes</button>
                            </div>
                        </div>    
                        </form>
                        </div>
                    </div>
                    <script src="../../jobExpert/company/assets/js/jquery.min.js"></script>
                    <script>
            const check = (oldusername,inputusername) => {
                console.log(oldusername,inputusername)
                        $.ajax({
                            type: "POST",
                            url: "includes/EmailCheck.php",
                            data:{
                                'oldusername':oldusername,
                                'email': inputusername,
                            },
                            success: function(res){
                                console.log(res);
                                if(res==-1){
                                    alert("Email Exist");
                                    document.getElementById("email").value="";
                                    }
                        }
                        })
                    }
            </script>
           