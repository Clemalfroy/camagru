<section class="section hero has-text-centered is-dark  is-bold">

    <div class="container">
        <h1 class="title">Gallery:</h1>
            <?php foreach ($pictures_paths as $img) { ?>
                <?php $author = $img->author($dbh) ?>
                <section class="section hero has-text-centered is-dark  is-bold">
                    <div id=<?= "picture_" . $img->get_id() ?>>
                        <h1 class="subtitle is-success"> <?= $author->username ?> Uploaded: </h1>
                        <img src=<?= "app/uploads/" . $img->get_name() ?>>
                        <p><?= $img->get_likes($dbh) ?> <i class="fas fa-heart"></i></p>
                        <?php if (array_key_exists("login", $_SESSION)) { ?>
                            <?php if ($author->get_username() === $_SESSION["login"]) { ?>
                                <div class="field is-grouped is-grouped-centered">
                                <p class="control">
                            <?php } ?>
                            <form name="likes" method="post" action="/like">
                                <input type="hidden" name="picture_id" value=<?= $img->get_id() ?>>
                                <input class="button is-warning" type="submit" value="Like">
                            </form>
                            </p>
                            <?php if ($author->get_username() === $_SESSION["login"]) { ?>
                                <p class="contol">
                                <form action="/delete_picture" method="POST">
                                    <input type="hidden" name="img_id" value=<?= $img->get_id() ?>>
                                    <input class="button is-danger" type="submit" name="delete" value="Delete picture">
                                </form>
                                <?php if ($author->get_username() === $_SESSION["login"]) { ?>
                                    </p>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                            <?php $comments = $img->get_comments($dbh) ?>
                            <?php foreach ($comments as $comment) { ?>
                                <p><?= $comment->get_author($dbh)->get_username() ?>: <?= $comment->get_text() ?></p>
                            <?php } ?>

                            <form method="post" action="/comment">
                                <input type="hidden" name="picture_id" value=<?= $img->get_id() ?>>
                                <input type="hidden" name="author_id" value=<?= $author->get_id() ?>>
                                <div class="field has-addons">
                                    <div class="control is-expanded">
                                        <input class="input" type="text" name="comment" placeholder="Comment" required>
                                    </div>
                                    <div class="control">
                                        <input class="button is-warning" type="submit" value="Comment">
                                    </div>
                                </div>
                            </form>

                        <?php } ?>
                    </div>
                </section>
            <?php } ?>
    </div>

</section>