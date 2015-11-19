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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<div id="signupform">
    <div class="description">
        <h2><a class="site-title" href="/">Silicon Prairie Tech</a></h2>

        <p>is a group of chat channels for prairie-based developers, designers, marketers, business people, hobbyists, students, and other professionals involved in technology.</p>

        <p>It’s a common space for all to use and enjoy. We talk about the technologies we use, our successes and failures, job opportunities, and the latest cute animal GIFs.</p>

        <p>Put your best email address in the box below and our robots will send you an invitation.</p>

        <form class="pure-form" method="post" action="invite">
            <fieldset>
                <input type="email" name="email" placeholder="you@example.com" value="{$smarty.request.email}">
                <button type="submit" class="pure-button pure-button-primary invite-button">Invite Me!</button>
            </fieldset>
        </form>
    </div>
    <footer>
        <p>Silicon Prairie Tech runs on
            <a href="https://slack.com">Slack</a>, a simple and easy way for people to stay connected. The current moderators are
            <a href="https://twitter.com/geoffreyarnold">Geoff Arnold</a> and <a href="#">Sean Richardson</a>.</p>

        <p>If you’d like to participate as an admin or to invite your group to the discussion, just ask one of them how to get involved.</p>

        <p>This site and the auto-inviter are heavily influenced from the fine work done by the
            <a href="https://github.com/tech404">tech404 team</a>. Big high five to
            <a href="https://twitter.com/michaelmase">Mike Mase</a> for the CSS love.</p>

        <a href="https://github.com/siliconprairietech/siliconprairietech.com" target="_blank"><span class="mega-octicon octicon-mark-github"></span></a>
    </footer>
</div>
<div id="googlemaps"></div>
<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('googlemaps'), {
            center: new google.maps.LatLng({$smarty.server.HTTP_X_APPENGINE_CITYLATLONG|default:'42.535108, -96.411094'}),
            zoom: 5,
            disableDefaultUI: true,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            zoomControl: true
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={$smarty.const.GOOGLE_MAPS_API_KEY}&callback=initMap"></script>
<script async defer src="markers.js"></script>
{*@formatter:off*}
<script type="text/javascript">(function(){ldelim}document.write('<a style="display:block;overflow:hidden;z-index:9999;position:absolute;top:10px;right:10px;" href="http://siliconprairiebuilt.com/" target="_blank"><img src="http://siliconprairiebuilt.com/build.php?i=footer-orange-lg.png&s=' + window.location.host + '" /></a>');{rdelim})();</script>
<script type="text/javascript">{if !empty($alert)}(function(){ldelim}swal({ldelim}title:"{$alert[0]}",text:"{$alert[1]}",type:"{$alert[2]}",confirmButtonColor:"#ffb600",confirmButtonText:"{$alert[3]}"{rdelim});{rdelim})();{/if}</script>
{*@formatter:on*}
</body>

</html>
