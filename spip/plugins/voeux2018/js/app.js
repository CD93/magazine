requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: 'plugins/voeux2018/js',
    //except, if the module ID starts with "app",
    //load it from the js/app directory. paths
    //config is relative to the baseUrl, and
    //never includes a ".js" extension since
    //the paths config could be for a directory.
    paths: {
        jquery: 'jquery.3.2.1.min',
        cookie: 'js.cookie'
    }
});
require(['domReady'], function (domReady) {
	domReady(function () {
		require(['jquery','cookie'], function ($, cookie) {
      $('#carte button').on('click', function(e) {
        var theme =  $(this).data("theme");
        $.get( "/?page=panneau", {theme: theme}).done(function( data ) {
            $("#panneau").html("des photos");
        });
        e.preventDefault();
        $( "#panneau" ).animate({
            left: "+=500"
          }, 250 );
				var offsets = $('#carte').offset();
				var left = offsets.left;
				decal = 0;
				if(left <= 500) {
					decal = 500 - left ;
          $("#carte" ).animate({
              left: "+=" + decal
            }, 250 );
				}
      });
			$('#fermer_menu').click(function(e) {
				e.preventDefault();
			});
		});
	});
});
