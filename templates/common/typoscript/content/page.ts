page = PAGE
page {
	typeNum = 0
	10 = USER
	10 {
		userFunc = tx_templavoila_pi1->main_page
	}
	includeCSS {
		reset = {$commonTemplateFolder}stylesheets/reset.css
		960 = {$commonTemplateFolder}stylesheets/960.css
	}
	includeJS {
		jquery = {$commonTemplateFolder}javascript/jquery-1.7.1.min.js
	}
	config {
		absRefPrefix = /
	}
}