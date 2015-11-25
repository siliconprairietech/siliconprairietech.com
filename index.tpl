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
    <h2><a href="/">Silicon Prairie Tech</a></h2>

    <p>is a group of chat channels for prairie-based developers, designers, marketers, business people, hobbyists, students, and other professionals involved in technology.</p>

    <p>It’s a common space for all to use and enjoy. We talk about the technologies we use, our successes and failures, job opportunities, and the latest cute animal GIFs.</p>

    <p>Put your best email address in the box below and our robots will send you an invitation.</p>

    <form class="pure-form" method="post" action="invite">
        <fieldset>
            <input type="email" name="email" placeholder="you@example.com" value="{$smarty.request.email|default:''}">
            <button type="submit" class="pure-button pure-button-primary invite-button">Invite Me!</button>
        </fieldset>
    </form>

    <footer>
        <p>Silicon Prairie Tech runs on
            <a href="https://slack.com" target="_blank">Slack</a>, a simple and easy way for people to stay connected. The current moderators are
            <a href="https://twitter.com/geoffreyarnold" target="_blank">Geoff Arnold</a> and
            <a href="https://twitter.com/rxasean" target="_blank">Sean Richardson</a>.</p>

        <p>If you’d like to participate as an admin or to invite your group to the discussion, just ask one of them how to get involved.</p>

        <p>This site and the auto-inviter are heavily influenced from the fine work done by the
            <a href="https://github.com/tech404" target="_blank">tech404 team</a>. Big high five to
            <a href="https://twitter.com/michaelmase" target="_blank">Mike Mase</a> for the CSS love.</p>

        <a href="https://github.com/siliconprairietech/siliconprairietech.com" target="_blank"><span class="mega-octicon octicon-mark-github"></span></a>
    </footer>
</div>
<div id="googlemaps"></div>
<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('googlemaps'), {
            center: new google.maps.LatLng({$smarty.server.HTTP_X_APPENGINE_CITYLATLONG|default:'42.535108, -96.411094'}),
            zoom: 4,
            disableDefaultUI: true,
            draggable: true,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            zoomControl: true
        });

        var markers = document.createElement('script');
        markers.async = 1;
        markers.src = 'markers.js';
        document.getElementsByTagName('head')[0].appendChild(markers);
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={$smarty.const.GOOGLE_MAPS_API_KEY}&callback=initMap"></script>
<script type="text/javascript">
    // @formatter:off
    {literal}(function(){document.write('<a style="display:block;overflow:hidden;z-index:9999;position:absolute;top:10px;right:10px;" href="http://siliconprairiebuilt.com/" target="_blank"><img src="http://siliconprairiebuilt.com/build.php?i=footer-orange-lg.png&s=' + window.location.host + '" /></a>');})();{/literal}
    // @formatter:on
</script>
<script type="text/javascript">
    // @formatter:off
    {if !empty($alert)}(function(){ldelim}swal({ldelim}title:"{$alert[0]}",text:"{$alert[1]}",type:"{$alert[2]}",confirmButtonColor:"#ffb600",confirmButtonText:"{$alert[3]}"{rdelim});{rdelim})();{/if}
    // @formatter:on
</script>
<script>
    // @formatter:off
  {literal}(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');{/literal}

  ga('create', '{$smarty.const.GOOGLE_ANALYTICS_TRACKING_ID}', 'auto');
  ga('send', 'pageview');
    // @formatter:on
</script>
</body>

</html>
