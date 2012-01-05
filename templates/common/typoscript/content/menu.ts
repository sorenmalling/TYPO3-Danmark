lib.menu.main = HMENU
lib.menu.main {
	special = directory
	special.value = 1
	1 = TMENU
	1 {
		expAll = 1
		noBlur = 1
		wrap = <ul class="menu-header">|</ul>
		NO {
			wrapItemAndSub = <li>|</li>
			allWrap = <h2>|</h2>
		}
	}
	2 < .1
	2 {
		wrap = <ul class="menu-items">|</ul>
		NO {
			wrapItemAndSub >
			allWrap = <li>|</li>
		}
	}
}