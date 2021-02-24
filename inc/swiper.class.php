<?php
class Swiper {
	public $slides;
	public $options;

	function __construct($slides, $options) {
    $this->slides = $slides;
		$this->options = $options;

		$this->buildMarkup();
  }

	function buildMarkup () {
		?>
		<!-- Slider -->
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach ($slides as $item) :
					if (isset($item['url']) && $item['url'] != '') : ?>
				<div class="swiper-slide">
					<img src="<?= $item['url'] ?>" alt>
				</div>
				<?php endif;
				endforeach ?>
			</div>

			<!-- Add Pagination -->
			<?php if ($this->options->pagination) : ?>
			<div class="swiper-pagination swiper-pagination-white"></div>
			<?php endif ?>
		</div>
		<?php
	}
}
