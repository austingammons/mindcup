<nav class="navbar navbar-expand-lg navbar-dark bg-dark cup-nav">
    <div class="container-fluid">
        <a class="navbar-brand" href="../home/index">mindcup</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="../thought/index">Thoughts</a>
                    <a class="nav-link" href="../concept/index">Concepts</a>
                    <a class="nav-link" href="../paradigm/index">Paradigms</a>
                    <a class="nav-link" href="../map/index">Mapping</a>
                <?php endif; ?>
            </div>
            <div class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="../account/dashboard">Account</a>
                    <a class="nav-link" href="../account/settings">Settings</a>
                    <a class="nav-link" href="../account/logout">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="../account/login">Login</a>
                    <a class="nav-link" href="../account/register">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>