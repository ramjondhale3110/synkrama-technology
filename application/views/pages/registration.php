<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="<?= asset_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>">
    <script src="<?= asset_url('js/jquery.min.js') ?>"></script>
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registration</h5>
                        <form method="post" action="<?= base_url('submit-form') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Enter First Name</label>
                                        <input type="text" class="form-control" name="firstName" value="<?= set_value('firstName') ?>" placeholder="First Name" required>
                                        <?= form_error('firstName', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Enter Last Name</label>
                                        <input type="text" class="form-control" name="lastName" value="<?= set_value('lastName') ?>" placeholder="Last Name" required>
                                        <?= form_error('lastName', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Enter Email Address</label>
                                        <input type="email" class="form-control" name="emailAddress" value="<?= set_value('emailAddress') ?>"  placeholder="Email Address" required>
                                        <?= form_error('emailAddress', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Create Password</label>
                                        <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>"  placeholder="Password" required>
                                        <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Select Type of User</label>
                                <select class="form-control" name="userType">
                                    <option value="" disabled selected>Select Type of User</option>
                                    <option value="0">Employee</option>
                                    <option value="1">Dealer</option>
                                </select>
                                <?= form_error('userType', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                        <p class="text-right mt-1">I have an Account ? <a href="<?= base_url('login') ?>" class="text-primary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= asset_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset_url('js/bootstrap.min.js') ?>"></script>
</body>

</html>