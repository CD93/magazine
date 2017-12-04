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
      
      $('#table_carte button').on('click', function(e) {
        e.preventDefault();
        var theme =  $(this).data("theme");
        $( "#panneau" ).load( "/?page=panneau", { "theme[]": [theme] } );
        $("#blanco").show().animate({opacity: "0.8"
      }, 400 );
        $( "#panneau" ).animate({
            left: "+=600"
          }, 400 );
      });
		});
	});
});
