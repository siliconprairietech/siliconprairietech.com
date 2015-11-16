<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Silicon Prairie Tech</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <style type="text/css" media="screen">
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
        }

        footer {
            border-top: 1px solid #f39c12;
            font-size: .85em;
        }

        #signupform {
            height: 100%;
            width: 475px;
            top: 0;
            left: 0;
            position: absolute;
            z-index: 1;
            padding: 20px;
            background: rgb(14, 99, 51);
            color: white;
            font-family: 'Lato', sans-serif;
            font-size: 21px;
            line-height: 1.35em;
            text-align: justify;
        }

        #googlemaps {
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: relative;
            z-index: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
            <input type="hidden" id="latitude" name="latitude" value="">
            <input type="hidden" id="longitude" name="longitude" value="">
        </form>
    </div>
    <footer>
        <p>Silicon Prairie Tech runs on
            <a href="https://slack.com">Slack</a>, a simple and easy way for people to stay connected. The current moderators are
            <a href="https://twitter.com/geoffreyarnold">Geoffrey Arnold</a> and <a href="#">Sean Richardson</a>.</p>

        <p>If you’d like to participate as an admin or to invite your group to the discussion, just ask one of them how to get involved.</p>

        <p>This site and the auto-inviter are heavily influenced from the fine work done by the
            <a href="https://github.com/tech404">tech404 team</a>.</p>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCy_StD5NXQgeJOTXDlNnyL38eF3neHB8&callback=initMap"></script>
<script async defer src="markers.js"></script>
<script type="text/javascript">(function () {
    document.write('<a style="display:block;overflow:hidden;z-index:9999;position:absolute;top:10px;right:10px;" href="http://siliconprairiebuilt.com/" target="_blank"><img src="http://siliconprairiebuilt.com/build.php?i=footer-orange-lg.png&s=' + window.location.host + '" /></a>');
})();</script>
</body>

</html>
