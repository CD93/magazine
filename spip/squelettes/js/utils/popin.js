/*
 * Global popin init
 * @param  {string} trigger Links to the content to laod
 * @return {object}         Return the `app.popin` object
 */
Popin = function(trigger, options) {
	'use strict';

	if (!(this instanceof Popin)) return new Popin(options);
	var _ = this;

	// Set defaults options
	_.options = {
		errorMsg: 'Oups ! Il semblerait qu’il y ai eu une erreur...',
		attr: 'href',
		type: 'ajax',
		content: '',
		gallery: false,
		onReady: function() {}
	};
	_.options.errorMarkup = '<div class="popin-section">'+ _.options.errorMsg +'</div>';
	_.options.contentMarkup = '<div class="popin-section">%content%</div>';

	// Extend options
	$.extend(true, _.options, options);
	var opts = _.options;

	// Global popin variables
	_.$holder      = $('#js-popin-holder');
	_.$popin       = $('#js-popin');
	_.$content     = $('#js-popin-content');
	_.$loader      = $('#js-popin-loader');
	_.$bg          = $('#js-popin-bg');
	_.$closeBtn    = $('#js-popin-close');
	_.$btn         = $(trigger);
	_.isOpen       = false;

	// Set all the element for later animations
	TweenLite.set( _.$bg,     { opacity: 0, scaleX: 0, scaleY: 0 });
	TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, x: '-50%', y: '-50%' });
	TweenLite.set( _.$popin,   { opacity: 0 });

	// Open on btn click
	if (_.$btn) {
		_.$btn.on('click', { instance: _ }, _.onBtnClick);
	}

	// Close when clicking on the background
	_.$holder.on('click', function(e) {
		var target = e.target || e.srcElement;
		if ( target.getAttribute('id') === 'js-popin-cell' && _.isOpen ) {
			_.close();
		}
	});


	/**
	 * Get the content in an iframe
	 * @param  {string} url URL to the content
	 */
	_.iframe = function(url) {

		_.isOpen = true;
		var sizing = _.$popin[0].getBoundingClientRect();
		// Transform the loader to the content size
		// _.$loader.addClass('is-morphing');
		TweenLite.to( _.$loader, 0.6, {
			x: '-50%',
			y: '-50%',
			// width: window.innerWidth,
			width: sizing.width,
			// height: window.innerHeight,
			height: sizing.height,
			borderRadius: '0%',
			onComplete: function() {
				_.isOpen = true;

				var frame = document.createElement('iframe');
				frame.frameBorder = 0;
				frame.style.opacity = 0;
				frame.onload = function() {
					TweenLite.to(frame, 1, { opacity: 1, onComplete: function() {
							TweenLite.set( _.$popin, { opacity: 1 });
							TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, width: '4em', height: '4em', borderRadius: '50%' });
						}
					});
				};
				_.$content.append( frame );
				frame.setAttribute('src', url);

				// Close on click on the closing button
				_.$closeBtn.on('click', function(e) {
					e.preventDefault();
					_.close();
				});

				// Close on 'esc'
				$document.bind('keyup', _.keyup );
			}
		});

	};


	/**
	 * Get the content via ajax
	 * @param  {string} url URL to the content
	 */
	_.ajax = function(url) {

		// AJAX call
		$.ajax({
			url: url
		})
		// Append data on success
		.done(function(data) {
			_.$content.append(data);
			_.$holder.addClass('has-popin');
		})
		// Error
		.fail(function() {
			_.$content.append( opts.errorMarkup );
			_.$holder.addClass('has-popin has-error');
		})
		// Always open to display error messages
		.always(function(data) {

			var sizing = _.$popin[0].getBoundingClientRect();

			// Transform the loader to the content size
			_.$loader.addClass('is-morphing');
			TweenLite.to( _.$loader, 0.6, {
				x: '-50%',
				y: '-50%',
				width: sizing.width,
				height: sizing.height,
				borderRadius: '0%',
				onComplete: function() {
					TweenLite.to( _.$popin, 0.6, { opacity: 1, ease: Expo.easeOut, onComplete: function() {
						_.$loader.removeClass('is-morphing');
						TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, width: '4em', height: '4em', borderRadius: '50%' });
						_.isOpen = true;
					} });

					// Close on click on the closing button
					_.$closeBtn.on('click', function(e) {
						e.preventDefault();
						_.close();
					});

					// Launch the `onReady` callback
					if (typeof opts.onReady === 'function') opts.onReady(_);

					// Close on 'esc'
					$(document).bind('keyup', _.keyup );
				}
			});
		});
	}; // END _.ajax();


	/**
	 * Simple text popin
	 * @param  {string} content The content to display
	 * @return {undefined}
	 */
	_.text = function(content) {

		_.$content.append( opts.contentMarkup.replace('%content%', opts.content) );
		var sizing = _.$popin[0].getBoundingClientRect();

		// Transform the loader to the content size
		_.$loader.addClass('is-morphing');
		TweenLite.to( _.$loader, 0.7, {
			delay: 0.1,
			x: '-50%',
			y: '-50%',
			opacity: 1,
			scaleX: 1,
			scaleY: 1,
			width: sizing.width,
			height: sizing.height,
			borderRadius: '0%',
			onComplete: function() {
				TweenLite.to( _.$popin, 0.6, { opacity: 1, ease: Expo.easeOut, onComplete: function() {
					_.$loader.removeClass('is-morphing');
					TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, width: '4em', height: '4em', borderRadius: '50%' });
					_.isOpen = true;
				} });

				// Close on click on the closing button
				_.$closeBtn.on('click', function(e) {
					e.preventDefault();
					_.close();
				});

				// Launch the `onReady` callback
				if (typeof opts.onReady === 'function') opts.onReady(_);

				// Close on 'esc'
				$(document).bind('keyup', _.keyup );
			}
		});
	};



	/**
	 * Simple text popin
	 * @param  {string} content The content to display
	 * @return {undefined}
	 */
	_.image = function(source) {

		$(document).off('keyup', _.keyup);
		var image = new Image();

		image.addEventListener('load', function() {

			_.$content.html(image);
			_.$holder.addClass('has-popin');

			var sizing = _.$popin[0].getBoundingClientRect();
			console.log(sizing);
			console.log(image.width, image.height)

			// Transform the loader to the content size
			_.$loader.addClass('is-morphing');
			TweenLite.to( _.$loader, 0.6, {
				x: '-50%',
				y: '-50%',
				width: sizing.width,
				height: sizing.height,
				borderRadius: '0%',
				onComplete: function() {
					TweenLite.to( _.$popin, 0.6, { opacity: 1, ease: Expo.easeOut, onComplete: function() {
						_.$loader.removeClass('is-morphing');
						TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, width: '4em', height: '4em', borderRadius: '50%' });
						_.isOpen = true;
					} });

					// Close on click on the closing button
					_.$closeBtn.on('click', function(e) {
						e.preventDefault();
						_.close();
					});

					// Launch the `onReady` callback
					if (typeof opts.onReady === 'function') opts.onReady(_);

					// Close on 'esc'
					$(document).on('keyup', _.keyup);
				}
			});
		});

		image.src = source;
	};


	/**
	 * Keyboard navivation
	 */
	_.keyup = function(e) {

		if ( e.which === 27 ) {
			_.close();
		}


		if (_.options.gallery) {
			var source;

			// Next
			if (e.which === 39 && _.current < _.$btn.length) {
				_.current += 1;
				source = _.$btn.eq(_.current).attr(_.options.attr);
				_.image(source);
			}

			// Prev
			if (e.which === 37 && _.current > 0) {
				_.current -= 1;
				source = _.$btn.eq(_.current).attr(_.options.attr);
				_.image(source);
			}
		}

	}; // END _.keyup();

	return _;
};



Popin.prototype = {

	/**
	 * Open the popin
	 * @param  {string}  url    The URL of the content to load
	 * @param  {boolean} iframe Load the content in an iframe?
	 * @return {object}        	Return the instance object
	 */
	open: function(content, type) {
		'use strict';

		var _ = this;

		content = content ? content : _.options.content;
		type = type ? type : _.options.type;

		$('html').addClass('is-no-scroll');
		_.$holder.addClass('has-popin');
		_.$holder.addClass('has-'+type);

		TweenLite.to( _.$bg, 0.6,     { opacity: 1, scaleX: 1, scaleY: 1 });
		if (type === 'text') {
			_[type]( content );
		} else {
			TweenLite.to( _.$loader, 0.6, { opacity: 1, scaleX: 1, scaleY: 1, delay: 0.3, onComplete: function() {
				_[type]( content );
			} });
		}

		return _;
	},



	/**
	 * Close the popin
	 * @return {object} The current instance
	 */
	close: function() {
		'use strict';

		var _ = this;
		$('html').removeClass('is-no-scroll');

		// If Opening animation is not already finished we
		// need to reset the _.$loader to its original state
		if ( _.$loader.hasClass('is-morphing') ) {
			_.$loader.removeClass('is-morphing');
			TweenLite.set( _.$loader, { opacity: 0, scaleX: 0, scaleY: 0, width: '4em', height: '4em', borderRadius: '50%' });
		}

		TweenLite.to( _.$popin, 0.4, { opacity: 0, scaleX: 0, scaleY: 0 });
		TweenLite.to( _.$bg, 0.6, { delay: 0.2, opacity: 0, scaleX: 0, scaleY: 0, onComplete: function() {
			// Reset the _.$popin scale for reopening
			TweenLite.set( _.$popin, { scaleX: 1, scale: 1 });
			// Set the global popin container to `display: none`
			_.$holder.removeClass('has-popin has-error has-iframe');
			// Empty the content
			_.$content.html('');
			// Set popin state to close
			_.isOpen = false;
			// Unbind the keyboard nav
			$document.off('keyup', _.keyup );
		} });

		return _;
	},



	/**
	 * Stuff to do when clicking on the triggers
	 * @param  {object} e The event being fired
	 * @return {undefined}
	 */
	onBtnClick: function(e) {
		'use strict';

		e.preventDefault();
		var _ = e.data.instance;
		var $this = $(this);
		var content = _.options.type === 'text' ? _.options.content : $this.attr(_.options.attr);
		if ( !_.isOpen ) _.open( content, _.options.type );
		if (_.options.gallery) {
			_.current = _.$btn.index($this);
			console.log(_.current);
		}
	},


	/**
	 * Update the triggers, useful when
	 * using AJAX to load more content
	 * @param  {object} trigger The jQuery object with all trigger
	 * @return {object}         The current instance
	 */
	updateTriggers: function(trigger) {
		'use strict';

		var _ = this;
		_.$btn.off('click', _.onBtnClick);
		_.$btn = $(trigger);
		_.$btn.on('click', { instance: _ }, _.onBtnClick);

		return _;
	}
};