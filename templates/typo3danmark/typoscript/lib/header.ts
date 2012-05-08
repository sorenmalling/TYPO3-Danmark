lib.header = COA
lib.header {
	5 = IMAGE
	5 {
		file = fileadmin/clear.gif
		file {
			width = 150
			height = 100
		}
		stdWrap {
			typolink {
				parameter = 1
			}
		}
	}
	10 = HMENU
	10 {
		wrap = <nav>|</nav>
		special = directory
		special.value = 1
		1 = TMENU
		1 {
			expAll = 1
			noBlur = 1
			wrap = <ul>|</ul>
			NO {
				wrapItemAndSub = <li>|</li>
			}
			stdWrap.append = TEXT
			stdWrap.append {
				wrap = <li>|</li>
				value = <input type="text" />
			}
		}
	}
}