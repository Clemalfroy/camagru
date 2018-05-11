<section class="hero is-warning is-bold">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="/">
                        <span class="title">
                            Camagru
                        </span>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                    <span></span>
                    <span></span>
                    <span></span>
                  </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item">
                            Gallery
                        </a>
                        <?php if (array_key_exists("login", $_SESSION)) { ?>
                            <a class="navbar-item">
                            Take a picture
                            </a>

                            <a class="navbar-item">
                                Parameters
                            </a>
                            <span class="navbar-item">
                        <a class="button is-warning is-inverted" href="/logout">
                        <span class="icon">
                          <i class="far fa-dot-circle"></i>
                        </span>
                        <span>Logout</span>
                         </a>
                        </span>

                        <?php } else { ?>
                            <span class="navbar-item">
                        <a class="button is-warning is-inverted" href="/log">
                        <span class="icon">
                          <i class="far fa-dot-circle"></i>
                        </span>
                        <span>Login</span>
                         </a>
                        </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>

<script src="/app/views/js/burger.js"></script>