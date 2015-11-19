<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Silicon Prairie Tech</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/octicons/3.3.0/octicons.min.css">
    <style type="text/css" media="screen">
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        a {
            color: rgb(255, 182, 0);
            text-decoration: none;
        }

        a:hover {
            color: #7f8c8d;
        }

        h2 {
            display: inline;
        }

        form {
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        form .invite-button {
            border-radius: 4px;
            background: rgb(255, 182, 0);
        }

        input {
            color: rgb(255, 182, 0);
            border: 0 !important;
        }

        footer {
            border-top: 1px solid #f39c12;
            font-size: .85em;
            padding-bottom: 20px;
        }

        .mega-octicon {
            width: 100%;
            text-align: center;
        }

        #signupform {
            height: 100%;
            width: 500px;
            top: 0;
            left: 0;
            position: absolute;
            padding: 20px;
            background: rgb(14, 99, 51);
            color: white;
            font-family: 'Lato', sans-serif;
            font-size: 21px;
            line-height: 1.35em;
            overflow: auto;
        }

        #googlemaps {
            height: 100%;
            width: calc(100% - 500px);
            float: right;
            top: 0;
            right: 0;
        }

        @media only screen
        and (max-width: 480px) {
            #signupform {
                width: auto;
            }

            input, button {
                display: block;
                width: 100%;
            }

            button {
                margin-top: 0 !important;
            }
        }
    </style>
</head>

<body>
<div id="signupform">
    <div class="description">
        <p>

        <h2><a class="site-title" href="/">Silicon Prairie Tech</a>
        </h2> is a group of chat channels for prairie-based developers, designers, marketers, business people, hobbyists, students, and other professionals involved in technology.</p>

        <p>It’s a common space for all to use and enjoy. We talk about the technologies we use, our successes and failures, job opportunities, and the latest cute animal GIFs.</p>

        <p>Put your best email address in the box below and our robots will send you an invitation.</p>

        <form class="pure-form" method="post" action="invite">
            <fieldset>
                <input type="email" name="email" placeholder="you@example.com" value="<?= $_REQUEST['email'] ?>">
                <button type="submit" class="pure-button pure-button-primary invite-button">Invite Me!</button>
            </fieldset>
        </form>
    </div>
    <footer>
        <p>Silicon Prairie Tech runs on
            <a href="https://slack.com">Slack</a>, a simple and easy way for people to stay connected. The current moderators are
            <a href="https://twitter.com/geoffreyarnold">Geoffrey Arnold</a> and <a href="#">Sean Richardson</a>.</p>

        <p>If you’d like to participate as an admin or to invite your group to the discussion, just ask one of them how to get involved.</p>

        <p>This site and the auto-inviter are heavily influenced from the fine work done by the
            <a href="https://github.com/tech404">tech404 team</a>. Huge thanks to
            <a href="https://twitter.com/michaelmase">Mike Mase</a> for the CSS love.</p>

        <a href="https://github.com/siliconprairietech/siliconprairietech.com" target="_blank"><span class="mega-octicon octicon-mark-github"></span></a>
    </footer>
</div>
<div id="googlemaps"></div>
<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('googlemaps'), {
            center: new google.maps.LatLng(<?= $_SERVER['HTTP_X_APPENGINE_CITYLATLONG'] ?: '42.535108, -96.411094' ?>),
            zoom: 5,
            disableDefaultUI: true,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            zoomControl: true
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= GOOGLE_MAPS_API_KEY ?>&callback=initMap"></script>
<script async defer src="markers.js"></script>
<script type="text/javascript">(function () {
        document.write('<a style="display:block;overflow:hidden;z-index:9999;position:absolute;top:10px;right:10px;" href="http://siliconprairiebuilt.com/" target="_blank"><img src="http://siliconprairiebuilt.com/build.php?i=footer-orange-lg.png&s=' + window.location.host + '"/></a>');
    })();</script>
<script type="text/javascript"><?= $alert ? "(function() {swal({title:\"{$alert[0]}\",text:\"{$alert[1]}\",type:\"{$alert[2]}\",confirmButtonColor:\"#0E6333\",confirmButtonText:\"{$alert[3]}\"});})();" : '' ?></script>
</body>

</html>
