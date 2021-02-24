// import Skeleton from './modules/skeleton.js'

document.addEventListener('DOMContentLoaded', event => {
	console.log('init')
	new Swiper('.swiper-container', {
		loop: true,
		slidesPerView: 1,
		effect: 'fade',
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		keyboard: {
			enabled: true,
		}
	})
})
