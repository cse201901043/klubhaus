<!DOCTYPE html>
<html>
<head>
	<title>KLUBHAUS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="logo.png" type="image/png" sizes="16x16">
	<style type="text/css">
	    @font-face{font-family:leaguegothicregular;src:url(League_Gothic-webfont.eot);src:url(League_Gothic-webfont.eot?#iefix) format('embedded-opentype'),url(League_Gothic-webfont.woff) format('woff'),url(League_Gothic-webfont.ttf) format('truetype'),url(League_Gothic-webfont.svg#LeagueGothicRegular) format('svg');font-weight:400;font-style:normal}
		body{
			background-color: #fdd00c;
		}
		
		.hide {
		    display : none;
		}
		
		.notify_me {
		    cursor : pointer;
		}
		

		#counter {
			width: 700px;
			height: 145px;
			margin: 1px auto 0 auto;
			font-family: 'LeagueGothicRegular', Arial, Helvetica, sans-serif;
			font-size: 92px;
			color: #272727;
			text-shadow: 0 1px 0 #fff;
			overflow: hidden;
		}

		.countDays, .countHours, .countMinutes, .countSeconds {
			float: left;
			width: 102px;
			height: 138px;
			padding-left: 36px;
			background: #e7e7e7;
			background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.1)), to(rgba(0,0,0,.07)));
			background-image: -webkit-linear-gradient(top, rgba(255,255,255,.1), rgba(0,0,0,.07));
			background-image: -moz-linear-gradient(top, rgba(255,255,255,.1), rgba(0,0,0,.07)); 
			background-image: -ms-linear-gradient(top, rgba(255,255,255,.1), rgba(0,0,0,.07)); 
			background-image: -o-linear-gradient(top, rgba(255,255,255,.1), rgba(0,0,0,.07));
			background-image: linear-gradient(top, rgba(255,255,255,.1), rgba(0,0,0,.07));
			border: 1px solid #ccc;
			-moz-border-radius: 4px;
			-webkit-border-radius: 4px;
			border-radius: 4px;
			-moz-box-shadow:
				0 2px 3px 0 rgba(255,255,255,.2) inset,
				0 2px 2px 0 rgba(0,0,0,.1);
			-webkit-box-shadow:
				0 2px 3px 0 rgba(255,255,255,.2) inset,
				0 2px 2px 0 rgba(0,0,0,.1);
			box-shadow:
				0 2px 3px 0 rgba(255,255,255,.2) inset,
				0 2px 2px 0 rgba(0,0,0,.1);
		}

		.points {
			float: left;
			width: 40px;
			margin: 0;
			font-family: Georgia, serif;
			font-size: 44px;
			font-weight: bold;
			text-align: center;
			line-height: 138px;
			text-shadow: none;
		}

		.position {
			position: relative;
			float: left;
			width: 35px;
			height: 92px;
			margin: 8px 0 0 0;
		}

		.digit {
			position: absolute;
			top: 0;
			left: 0;
		}

		.boxName {
			float: left;
			width: 80px;
			margin: -5px 0 0 7px;
			font-size: 36px;
			color: #a6a6a6;
			text-shadow: 0 1px 0 rgba(255,255,255,.5);
		}

		.Hours { margin-left: 5px; }
		.Seconds { margin-left: 2px; }
		
		@media only screen and (max-width: 500px){

        #counter {
        width: 100vw;
        height: 115px;
        margin: 30px auto 0 auto;
        font-family: 'LeagueGothicRegular', Arial, Helvetica, sans-serif;
        font-size: 60px;
        color: #272727;
        text-shadow: 0 1px 0 #fff;
        overflow: hidden;
        }
        .countDays, .countHours, .countMinutes, .countSeconds {
        float: left;
        width: 13vw;
        height: 115px;
        padding-left: 22px;
        }
        .position {
        position: relative;
        float: left;
        width: 22px;
        height: 72px;
        margin: 8px 0 0 0;
        }
        .boxName {
        float: left;
        width: 80px;
        margin: -5px 0 0 -5px;
        font-size: 36px;
        color: #a6a6a6;
        text-shadow: 0 1px 0 rgba(255,255,255,.5);
        }

    }
    
    @media only screen and (max-width: 420px){

#counter {
width: 100vw;
height: 100px;
font-size: 40px;
}
.countDays, .countHours, .countMinutes, .countSeconds {
float: left;
width: 13vw;
height: 100px;
padding-left: 10px;
}
.position {
position: relative;
float: left;
width: 22px;
height: 60px;
margin: 8px 0 0 0;
}
.boxName {
margin: -5px 0 0 0;
font-size: 25px;
}
.points {
font-size: 44px;
line-height: 95px;
width:35px;
}

}

	</style>
	<style type="text/css" src="https://1stwebdesigner.com/demos/coming-soon/css/reset.css"></style>
	<style type="text/css" src="https://1stwebdesigner.com/demos/coming-soon/fonts/stylesheet.css"></style>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	 <?= $this->Html->script(['jquery.countdown.js', 'scripttimer.js']) ?>
	 <script type="text/javascript" src='https://1stwebdesigner.com/demos/coming-soon/js/modernizr.custom.js'></script>
</head>
<body>
	<div style="text-align: center; padding-top: 60px;">
		<img src="images/Sale.png" style="max-width:100%;height:auto;">	
	</div>
	<div style="text-align: center; padding-top: 22px;">
		<img src="images/Coming-soon.png" style="max-width:100%;height:auto;">	
	</div>
	<div style="text-align: center; padding-top: 50px;">
		<a href="https://www.facebook.com/klubhausbd/" target="_blank">
			<img src="images/Notify-me.png" style="max-width:100%;height:auto;" class="notify_me">	
		</a>
	</div>
	<!--<div style="width: 800px;">-->
		<div id="counter"></div>
	<!--</div>-->
	<div style="text-align: center; padding-top: 32px;">
		
			<img src="images/Logo.png" style="max-width:100%;height:auto;">
			
	</div>
	 <!--Load Facebook SDK for JavaScript -->
    <div id="fb-root" class="hide"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v3.2'
        });
      };
    
      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    $('.notify_me').on('click', function(e){
    	e.preventDefault();
    	$('#fb-root').removeClass('hide');
    	$('#fb-root').trigger('click');
    	$('.fb-customerchat').trigger('click');

    	
    })
    </script>

 <!--Your customer chat code -->
    <div class="fb-customerchat"
      attribution=setup_tool
      page_id="174330283146394"
      theme_color="#268ece"
      logged_in_greeting="Want a reminder? Just message us “Klubhaus” and join the Klub! "
      logged_out_greeting="Want a reminder? Just message us “Klubhaus” and join the Klub! ">
    </div>
</body>
</html>