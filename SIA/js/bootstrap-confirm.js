/*!
 * =================================================
 *  bootstrap-confirm
 * =================================================
 *
 * Description: Modal dialog confirmation and message based on bootstrap v3.
 * Version: 1.0
 * License: MIT
 * Author: Hugo Sóstenes <hugo.msn@msn.com>
 */
  
;(function($) {
	'use strict';
	$.confirm = function(options) {
		if ($.fn.modal === undefined) 
 			throw new Error('bootstrap-confirm JavaScript requires Bootstrap.js');
 		
		var settigns = $.extend({
				onOk: function() {},
				onCancel: function() {}
			}, $.confirm.defaults, options),
			dialogClose = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
			buttonOk = '<button type="button" class="btn btn-'+ settigns.templateOk +'" data-confirm="Ok">'+ settigns.labelOk +'</button>',
			buttonCancel = '<button type="button" class="btn btn-'+ settigns.templateCancel +'" data-confirm="Cancel">'+ settigns.labelCancel +'</button>',
			dialogFooter = '<div class="modal-footer">' + (settigns.buttonOk ? buttonOk : '') + (settigns.buttonCancel ? buttonCancel : '') + '</div>',
			$dialog = $('<div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">' +
				'<div class="modal-dialog modal-sm" role="document">' +
				'<div class="modal-content">' +
				'<div class="modal-header bg-'+ settigns.template +'">' +
				'<h4 class="modal-title">' +
				(!settigns.buttonOk && !settigns.buttonCancel ? dialogClose : '') +
				'<i class="' + settigns.titleIcon + '"></i> '+ settigns.title +'</h4>' +
				'</div>' +
				'<div class="modal-body">'+ settigns.message +'</div>' +
				(settigns.buttonOk || settigns.buttonCancel ? dialogFooter : '') +
				'</div>' +
				'</div>'
			);

		$dialog.find('.modal-header').css({
			'-webkit-border-top-left-radius': '6px',
			'-webkit-border-top-right-radius': '6px',
			'-moz-border-radius-topleft': '6px',
			'-moz-border-radius-topright': '6px',
			'border-top-left-radius': '6px',
			'border-top-right-radius': '6px'
		});

		$dialog.on('hidden.bs.modal', function(event) {
			$(this).remove();
		});

		$dialog.find('button[data-confirm="Ok"]').click(function(event) {
			event.preventDefault();
			$dialog.modal('hide');
			settigns.onOk.call(this);
		});

		$dialog.find('button[data-confirm="Cancel"]').click(function(event) {
			event.preventDefault();
			$dialog.modal('hide');
			settigns.onCancel.call(this);
		});

		$dialog.appendTo('body');
		$dialog.modal('show');
	};
	
	$.confirm.defaults = {
		message: '',
		buttonOk: true,
		buttonCancel: true,
		template: 'danger',
		title: 'Confirm',
		titleIcon: 'glyphicon glyphicon-question-sign',
		labelOk: 'Confirm',
		labelCancel: 'Cancel',
		templateOk: 'danger',
		templateCancel: 'default'
	};

})(jQuery);