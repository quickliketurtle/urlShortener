<!doctype html>
<html>
<head>
    <title>URL Shortener</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/templates/css/style.css"/>
</head>
<body>
    <div class="container put-the-dang-thing-in-the-middle">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <h1 class="">Shorten A URL</h1>
            <div class="form">
                <form role="form" action="links" method="post">
                    <div class="input-group input-group-lg">
                        <input type="text" name="url" class="form-control" placeholder="http://jeff-finley.com">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Get Short URL</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="alert alert-dismissable alert-danger error hidden">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php if (isset($flash['error'])) { echo $flash['error']; } ?>
            </div>
            <div class="alert alert-dismissable alert-info message hidden" style="text-align: center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php if (isset($flash['flash_message']))
                { echo "Here is your short URL: <a href=" . $flash['flash_message'] . ">" .
                    $flash['flash_message'] . "</a>";
                } ?>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
        // display error alert if error exist.
        var error = "<?php echo $flash['error']; ?>";
        if (error) {
            $('.error').removeClass('hidden');
        }

        // display shortened url.
        var message = "<?php echo $flash['flash_message']; ?>";
        if (message) {
            $('.message').removeClass('hidden');
        }

    </script>
</body>
