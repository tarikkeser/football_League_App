<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex justify-content-evenly w-100">
                <li class="nav-item"><a class="nav-link" href="/">Home Page</a></li>
                <li class="nav-item"><a class="nav-link" href="/leaguestandings">League Standings</a></li>
                <li class="nav-item"><a class="nav-link" href="/players">Players</a></li>
                <li class="nav-item"><a class="nav-link" href="/teams">Teams</a></li>
                <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>

                <?php if ($isLoggedIn): ?>
                    <li class="nav-item">
                        <span class="nav-link text-light">Welcome, <?php echo $username; ?>!</span>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
