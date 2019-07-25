<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Page</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-lg-5 col-lg-offset-3">
            <br><br>
            <h1>Registrasi Akun</h1>
            <br>
            <p>Silahkan isi detail di bawah ini untuk membuat akun baru.</p>
            <br>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
            <?php } ?>
            <?php echo validation_errors('<div class="alert-danger">', '</div>');?>       
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" name="level" id="level">
                        <option value="dokter">dokter</option>
                        <option value="perawat">perawat</option>
                        <option value="apoteker">apoteker</option>
                    </select>
                </div>
                <div class="text-center">
                    <button class="btn btn-success register_btn" name="register">Register</button>
                </div>
            </form>
        </div>

        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    </body>
</html>