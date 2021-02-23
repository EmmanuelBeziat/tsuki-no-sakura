// import Skeleton from './modules/skeleton.js'
import Swiper from '../vendors/swiper/swiper.min.js'

document.addEventListener('DOMContentLoaded', event => {
	console.log('init')
	new Swiper('.swiper-container', {
		loop: true,
		slidesPerView: 1,
		autoplay: {
			delay: 2500,
			disableOnInteraction: true,
		},
		keyboard: {
			enabled: true,
		}
	})
})
