<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show details</title>
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/datatable.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/list_style.css">
</head>

<body>
    <div class="container">
        <?php echo $this->session->flashdata('msg'); ?>
        <table class="table table-striped table-hover" id="table_data">
            <h2>Show Details of all users:</h2>
            <div>
                <thead class="thead-light">
                    <tr>
                        <th class="new">User Id</th>
                        <th class="new">First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Phone No.</th>
                        <th>Date of Birth</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
            </div>
        </table>
    </div>
    <input type="hidden" id="base" value="<?php echo base_url(); ?>">
</body>
<!-- jQuery Library -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/ajax.js" type="text/javascript"> </script>

</html>