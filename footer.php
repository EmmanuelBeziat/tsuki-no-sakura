<?php
/**
 * Footer file for the Sakura WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Sakura
 * @since Sakura 1.0
 */

?>

			</main>

			<footer id="site-footer" class="site-footer" role="contentinfo">
				<div class="container">
					<div class="footer-credits">
						<p class="footer-copyright">&copy;
							<?= date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x('Y', 'copyright date format', 'plume')
							);
							?>
							<a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
						</p>
					</div>

					<a class="to-the-top screen-reader-text" href="#site-header">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf(__('To the top %s', 'sakura'), '<span class="arrow" aria-hidden="true">&uarr;</span>');
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf(__('Up %s', 'sakura'), '<span class="arrow" aria-hidden="true">&uarr;</span>');
							?>
						</span>
					</a>
				</div>
			</footer>
		</div>
	</body>
</html>
