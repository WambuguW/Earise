
<link href="src/examples.css" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" />

<!-- we want to force people to click a button, so hide the close link in the toolbar -->
<style type="text/css">a.ui-dialog-titlebar-close { display:none }</style>

<!-- dialog window markup -->
<div id="dialog" title="Your session is about to expire!">
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
		You will be logged off in <span id="dialog-countdown" style="font-weight:bold"></span> seconds.
	</p>
	
	<p>Do you want to continue your session?</p>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
<script src="src/jquery.idletimer.js" type="text/javascript"></script>
<script src="src/jquery.idletimeout.js" type="text/javascript"></script>

<script type="text/javascript">
// setup the dialog
$("#dialog").dialog({
	autoOpen: false,
	modal: true,
	width: 400,
	height: 200,
	closeOnEscape: false,
	draggable: false,
	resizable: false,
	buttons: {
		'Yes, Keep Working': function(){
			$(this).dialog('close');
		},
		'No, Logoff': function(){
			// fire whatever the configured onTimeout callback is.
			// using .call(this) keeps the default behavior of "this" being the warning
			// element (the dialog in this case) inside the callback.
			$.idleTimeout.options.onTimeout.call(this);
		}
	}
});

// cache a reference to the countdown element so we don't have to query the DOM for it on each ping.
var $countdown = $("#dialog-countdown");

// start the idle timer plugin
$.idleTimeout('#dialog', 'div.ui-dialog-buttonpane button:first', {
	idleAfter: 5,
	pollingInterval: 2,
	keepAliveURL: 'keepalive.php',
	serverResponseEquals: 'OK',
	onTimeout: function(){
		window.location = "timeout.htm";
	},
	onIdle: function(){
		$(this).dialog("open");
	},
	onCountdown: function(counter){
		$countdown.html(counter); // update the counter
	}
});

</script>



