/*!************************************************************************************
 Made with love by the fantastic, the incredible, the amazing...
**************************************************************************************

         888                  888 d8b                                 888
         888                  888 Y8P                                 888
         888                  888                                     888
.d8888b  888888 888  888  .d88888 888  .d88b.  88888b.d88b.   .d88b.  888888  8888b.
88K      888    888  888 d88" 888 888 d88""88b 888 "888 "88b d8P  Y8b 888        "88b
"Y8888b. 888    888  888 888  888 888 888  888 888  888  888 88888888 888    .d888888
     X88 Y88b.  Y88b 888 Y88b 888 888 Y88..88P 888  888  888 Y8b.     Y88b.  888  888
 88888P'  "Y888  "Y88888  "Y88888 888  "Y88P"  888  888  888  "Y8888   "Y888 "Y888888

*************************************************************************************
 Interactive Design Agency - http://www.studiometa.fr   <info@studiometa.fr>
*************************************************************************************/

// Avoid `console` errors in browsers that lack a console.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());