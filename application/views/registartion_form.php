<html>

<head>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>

<body>
    <form method="post" action="<?php echo base_url() ?>Registration/insert_form" id="registration_form">
        <div class="container">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <header class="card-header">
                            <a href="<?= base_url() ?>registration/view" class=" float-right btn btn-outline-primary mt-1">Show Data</a>
                            <h4>Registration</h4>
                        </header>
                        <article class="card-body">

                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                    <input type="text" name="firstname" class="form-control" placeholder="">
                                    <span class="text text-danger"><?php echo form_error('firstname'); ?></span>
                                </div>
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder=" ">
                                    <span class="text text-danger"><?php echo form_error('lastname'); ?></span>
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="">
                                <span class="text text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <span class="form-check-label"> Female</span>
                                </label>
                                <span class="text text-danger"><?php echo form_error('gender'); ?></span>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Phone number</label>
                                    <input type="text" name="phonenumber" class="form-control" maxlength="10">
                                    <span class="text text-danger"><?php echo form_error('phonenumber'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of birth</label>
                                    <input type="date" name="dateofbirth" class="form-control">
                                    <span class="text text-danger"><?php echo form_error('dateofbirth'); ?></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control">
                                    <span class="text text-danger"><?php echo form_error('city'); ?></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <select id="inputState" class="form-control" name="country">
                                        <option value> Choose...</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Russia">Russia</option>
                                        <option value="United States">United States</option>
                                        <option value="India">India</option>
                                        <option value="Afganistan">Afganistan</option>
                                    </select>
                                    <span class="text text-danger"><?php echo form_error('country'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Register </button>
                            </div> 

                        </article> 
                    </div> 
                </div>
            </div> 
        </div>
    </form>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/additional-methods.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/validation.js"></script>
</body>

</html>