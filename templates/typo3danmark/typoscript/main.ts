<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/common/typoscript/main.ts">
<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/typo3danmark/typoscript/lib/header.ts">
<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/typo3danmark/typoscript/lib/news.ts">

page {
	includeCSS {
		main = {$typo3danmarkTemplateFolder}stylesheets/main.css
		columns = {$typo3danmarkTemplateFolder}stylesheets/columns.css
		navigation = {$typo3danmarkTemplateFolder}stylesheets/navigation.css
		forms = {$typo3danmarkTemplateFolder}stylesheets/forms.css
	}
	includeJS {
		boxslider = https://raw.github.com/ekallevig/jShowOff/master/jquery.jshowoff.min.js
		boxslider.external = 1
		slider = {$typo3danmarkTemplateFolder}javascript/slider.js
	}

}