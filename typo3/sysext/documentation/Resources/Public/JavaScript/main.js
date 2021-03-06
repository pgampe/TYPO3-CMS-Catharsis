TYPO3.DocumentationApplication = {
	datatable: null,
	// Utility method to retrieve query parameters
	getUrlVars: function getUrlVars() {
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++) {
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	},
	// Initializes the data table, depending on the current view
	initializeView: function() {
		var getVars = this.getUrlVars();
		// getVars[1] contains the name of the action key
		// List view is the default view
		if (getVars[getVars[1]] == 'manage') {
			this.documentationManageView(getVars);
		} else {
			this.documentationListView(getVars);
		}
	},
	// Initializes the list view
	documentationListView: function(getVars) {
		this.datatable = $('#typo3-documentation-list').dataTable({
			'bPaginate': false,
			'bJQueryUI': true,
			'bLengthChange': false,
			'iDisplayLength': 15,
			'bStateSave': true
		});

		// restore filter
		if (this.datatable.length && getVars['search']) {
			this.datatable.fnFilter(getVars['search']);
		}
	},
	// Initializes the management view
	documentationManageView: function(getVars) {
		this.datatable = $('#typo3-documentation-manage').dataTable({
			'bPaginate': false,
			'bJQueryUI': true,
			'bLengthChange': false,
			'iDisplayLength': 15,
			'bStateSave': true,
			'aaSorting': [[ 1, 'asc' ]]
		});

		// restore filter
		if (this.datatable.length && getVars['search']) {
			this.datatable.fnFilter(getVars['search']);
		}
	}
};

// IIFE for faster access to $ and save $ use
(function ($) {

	$(document).ready(function() {
		// Initialize the view
		TYPO3.DocumentationApplication.initializeView();

		// Make the data table filter react to the clearing of the filter field
		$('.dataTables_wrapper .dataTables_filter input').clearable({
			onClear: function() {
				TYPO3.DocumentationApplication.datatable.fnFilter('');
			}
		});
	});
}(jQuery));