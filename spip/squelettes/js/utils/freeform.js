(function($) {
	'use strict';

	var FreeForm = window.FreeForm || {};

	FreeForm = (function() {

		function FreeForm(selector, options) {
			if (!(this instanceof FreeForm)) return new FreeForm();
			var _ = this;

			var $form = $(selector);
			_.$form = $form;
			_.$formTexts = $form.find('.form-text');
			_.$formCheckboxes = $form.find('.form-checkbox');

			// Options
			_.options = {
				onSuccess: function() {},
				afterSucces: function() {},
				onError: function() {},
				afterError: function() {}
			};

			$.extend(true, _.options, options);


			// Remove the error class when typing
			_.$formTexts.on('input paste keyup', function() {
				$(this).closest('.form-el').removeClass('has-error');
			});

			_.$formCheckboxes.on('change', function() {
				$(this).closest('.form-el').removeClass('has-error');
			});

			// Submit
			$form.on('submit', function(e) {
				e.preventDefault();

				$.ajax({
					data: $form.serialize(),
					url: $form.attr('action'),
					type: 'POST',
					dataType: 'JSON'
				})
				.done(function(data) {

					$form.find('.has-error').removeClass('has-error');

					if (data.success) {
						console.log('success');
						_.onSuccess();
					} else {
						console.log('error');
						_.onError(data);
					}

				})
				.fail(function(data) {
					console.log('error');
				});

			});
		}

		return FreeForm;

	}());


	/**
	 * Stuff to do when form is successful
	 * @return {undefined}
	 */
	FreeForm.prototype.onSuccess = function() {
		var _ = this;

		// On success callback
		if (typeof _.options.onSuccess === 'function') _.options.onSuccess();

		_.$form.find('.form-text, form-textarea').val('');

		var popin = new Popin(null, {
			type: 'text',
			content: 'Votre message a bien été envoyé !',
			onReady: function() {
				setTimeout(function() {
					popin.close();
					// After success callback
					if (typeof _.options.afterSucces === 'function') _.options.afterSucces();
				}, 2000);
			}
		});
		popin.open();
	};


	/**
	 * Stuff to do when there is an error in the form
	 * @param  {string} data The AJAX response data
	 * @return {undefined}
	 */
	FreeForm.prototype.onError = function(data) {
		var _ = this;

		// On error callback
		if (typeof _.options.onError === 'function') _.options.onError();

		$.each(data.errors, function(name, error) {

			var $formEl = _.$form.find('[name="'+ name +'"]').closest('.form-el');
			var $error = $formEl.find('.form-error');

			if ( error === 'Required field missing input' ) error = 'Champs requis';
			if ( error === 'Not a valid email' ) error = 'Email non valide';
			if ( error === 'Not a number' ) error = 'Numéro non valide';

			$formEl.removeClass('has-success').addClass('has-error');
			$error.html(error);

		});

		// Scroll to first error
		var $scrollContainer = _.$form.closest('.js-side-container');
		$scrollContainer = $scrollContainer.length ? $scrollContainer : window;
		var $firstError = _.$form.find('.has-error').eq(0);
		var offset = $firstError.offset().top - 100;
		offset = $scrollContainer.length ? offset - _.$form.closest('.js-side-content').offset().top : offset;
		TweenLite.to($scrollContainer, 0.75, { scrollTo: { y: offset }, onComplete: function() {
			// After error callback
			if (typeof _.options.afterError === 'function') _.options.afterError();
		}});
	};



	/**
	 * jQuery plugin
	 * @param  {object} options Options to be passed
	 * @return {object} this
	 */
	$.fn.freeForm = function(options) {
		var _ = this, i;
		for (i = 0; i < _.length; i++) {
			_[i].freeForm = new FreeForm(_[i], options);
		}

		return this;
	};

})(jQuery);