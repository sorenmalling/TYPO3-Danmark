lib.header = HMENU
lib.header {
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
	}
}