

        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<meta name="description" content="The first carpooling company in Albania." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="generator" content="Codeply">
        <link rel="stylesheet" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/animate.min.css" />
        <link rel="stylesheet" href="./css/ionicons.min.css" />
        <link rel="stylesheet" href="./css/stili.css" />
        <link rel="stylesheet" href="./css/notification.css" />
        <script type="text/javascript">
            $(document).ready(
                function() {
                    $("#show").load("xhandar.php");
                    setInterval(function(){
                        $("#show").load("xhandar.php")
                    },2000);
                });
        </script>
        <script type="text/javascript">
            function play_sound() {
                var audioElement = document.createElement('audio');
                audioElement.setAttribute('src', '/u_not.mp3');
                audioElement.setAttribute('autoplay', 'autoplay');
                audioElement.load();
                audioElement.play();
            }
        </script>

        <style type="text/css">
            .noti_bubble {
                position:absolute;    /* This breaks the div from the normal HTML document. */
                top: 2px;
                right:4px;
                padding:1px 2px 1px 2px;
                background-color:red; /* you could use a background image if you'd like as well */
                color:white;
                font-weight:bold;
                border-radius:30px;
                box-shadow:1px 1px 1px gray;
            }

            .popover{
                width:100px;
            }
        </style>

