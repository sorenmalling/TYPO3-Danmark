<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/common/typoscript/main.ts">
<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/typo3danmark/typoscript/lib/header.ts">
<INCLUDE_TYPOSCRIPT: source="FILE: fileadmin/templates/typo3danmark/typoscript/lib/news.ts">

page {
	includeCSS {
		main = {$typo3danmarkTemplateFolder}stylesheets/main.css
		columns = {$typo3danmarkTemplateFolder}stylesheets/columns.css
		navigation = {$typo3danmarkTemplateFolder}stylesheets/navigation.css
	}
}