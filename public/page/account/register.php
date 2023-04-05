<?php 

include('../src/service/account.php');

$error_messages = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new AccountService();
    $error_messages = $service->get_form_validation_errors($_POST);

    if (count($error_messages) === 0) {
        $service->Register($_POST);
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <?php foreach($error_messages as $key=>$message): ?>
            <div style="color:red;"><?php echo $message; ?></div>
        <?php endforeach; ?>
    </div>
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Register</h1>
            <p>Create an account to get started</p>
            <form class="form-inline" method="post" novalidate>
                <div class="form-group mb-2">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>