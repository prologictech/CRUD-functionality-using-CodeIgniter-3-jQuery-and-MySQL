<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body>

    <div class="container">
        <br>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Update Details</h4>
                    </header>
                    <article class="card-body">
                        <form method="post" id="update_form" action="<?= base_url(); ?>Registration/update_data">
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <label>First name </label>
                                    <input type="text" class="form-control" placeholder="" id="fname" name="fname" value="<?= $users->first_name ?>">
                                </div>
                                <span class="text text-danger"><?php echo form_error('fname'); ?></span><!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder=" " id="lname" name="lname" value="<?= $users->last_name ?>">
                                </div>
                                <span class="text text-danger"><?php echo form_error('lname'); ?></span><!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="" id="email" name="email" value="<?= $users->email ?>">
                                <span class="text text-danger"><?php echo form_error('email'); ?></span>
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" <?php
                                                                                                                        echo set_value('gender', $users->gender) == 'male' ? "checked" : "";
                                                                                                                        ?> />
                                    <span class="form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="female" <?php
                                                                                                                            echo set_value('gender', $users->gender) == 'female' ? "checked" : "";
                                                                                                                            ?> />
                                    <span class="form-check-label"> Female</span>
                                </label>
                            </div>
                            <span class="text text-danger"><?php echo form_error('gender'); ?></span><!-- form-group end.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="<?= $users->city; ?>">
                                </div> <!-- form-group end.// -->
                                <div class="form-group col-md-6">
                                    <label>Country</label>
                                    <select id="inputState" name="country" class="form-control">
                                        <option value> Choose...</option>
                                        <option value="Uzbekistan" <?php
                                                                    echo set_value('country', $users->country) == 'Uzbekistan' ? "selected" : "";
                                                                    ?>>Uzbekistan</option>
                                        <option value="Russia" <?php
                                                                echo set_value('country', $users->country) == 'Russia' ? "selected" : "";
                                                                ?>>Russia</option>
                                        <option value="United_States" <?php
                                                                        echo set_value('country', $users->country) == 'United_States' ? "selected" : "";
                                                                        ?>>United States</option>
                                        <option value="India" <?php
                                                                echo set_value('country', $users->country) == 'India' ? "selected" : "";
                                                                ?>>India</option>
                                        <option value="Afganistan" <?php
                                                                    echo set_value('country', $users->country) == 'Afganistan' ? "selected" : "";
                                                                    ?>>Afganistan</option>
                                    </select>
                                </div>
                                <span class="text text-danger"><?php echo form_error('country'); ?></span><!-- form-group end.// -->
                            </div> <!-- form-row.// -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Mobile No.</label>
                                    <input class="form-control" type="text" id="phone_no" name="phone_no" value="<?= $users->phone_no; ?>" maxlength="10">
                                    <span class="text text-danger"><?php echo form_error('phone_no'); ?></span> <!-- form-group end.// -->
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" id="dob" name="dob" value="<?= $users->user_dob; ?>">
                                    <span class="text text-danger"><?php echo form_error('dob'); ?></span><!-- form-group end.// -->
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update" id="update" class="btn btn-primary btn-block"> Update </button>
                            </div> <!-- form-group// -->
                        </form>
                    </article> <!-- card-body end .// -->
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div> <!-- row.//-->


    </div>
    <!--container end.//-->

    <br><br>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/additional-methods.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/update_validate.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax.js" type="text/javascript"></script>

</body>

</html>