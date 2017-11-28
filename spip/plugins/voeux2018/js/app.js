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
        $( "#panneau" ).load( "/?page=panneau", { "theme[]": [theme] } );
      
        e.preventDefault();
        $( "#panneau" ).animate({
            left: "+=600"
          }, 250 );
      });
			$('#fermer_menu').click(function(e) {
				e.preventDefault();
			});
		});
	});
});
