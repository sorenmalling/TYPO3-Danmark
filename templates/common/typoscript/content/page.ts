page = PAGE
page {
	5 = TEXT
	5 {
		value = <a href="http://github.com/sorenmalling/TYPO3-Danmark" target="blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/camo.github.com/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub"></a>
	}
	10 = USER
	10 {
		userFunc = tx_templavoila_pi1->main
	}
	typeNum = 0
	includeCSS {
		reset = {$commonTemplateFolder}stylesheets/reset.css
	}
	includeJS {
		jquery = {$commonTemplateFolder}javascript/jquery-1.7.1.min.js
		jqueryui = {$commonTemplateFolder}javascript/jquery-ui-1.8.16.custom.min.js
	}
	config {
		absRefPrefix = /
		compressJs = 0
		concatenateJs = 0
		compressCss = 0
		concatenateCss = 0
		doctype = html5
	}
}