<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new AccountService();
    $service->Login($_POST["email"], $_POST["password"]);
}

?>

<div class="page-center">
    <div class="page-center-contents">
    <h1>Login</h1>
    <p>Enter your credentials to continue</p>
    <form class="form-inline" method="post" novalidate>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="<?= htmlspecialchars($_POST["email"] ?? "")?>">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <a href="register" class="btn btn-outline-secondary">register</a>
            <button type="submit" class="btn btn-outline-dark float-right">login</button>
        </div>
    </form>
</div>