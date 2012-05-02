lib.news = CONTENT
lib.news {
	table = tx_news_domain_model_news
	wrap = <ul>|</ul>
	select {
		pidInList = 19
		orderBy = sorting
	}
	renderObj = COA
	renderObj {
		wrap = <li>|</li>
		5 = TEXT
		5 {
			value = <img src="fileadmin/templates/typo3danmark/images/banner.png" />
			wrap = |
		}

		10 = COA
		10 {
			wrap = <div>|</div>
			5 = TEXT
			5 {
				field = title
				wrap = <h3>|</h3>
			}
			10 = TEXT
			10 {
				field = teaser // bodytext
				wrap <p>|</p>
			}
			15 = TEXT
			15 {
				wrap = <p>|</p>
				value = Læs mere
				typolink {
					parameter = 5
					ATagParams = class="button orange"
				}
			}
		}
	}
}