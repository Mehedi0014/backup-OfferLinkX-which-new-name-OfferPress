<?php
/**
 * Update Registration
 *
 * @package OfferLinkX
 */

?>
<div class="wrap">
	<div id="poststuff">
		<div id="post-body">
			<div class="tnc-offerlinkx-column-left">
				<div class="postbox">
					<h3><?php echo esc_html__( 'Register OfferLinkX', 'offerlinkx' ); ?></h3>
					<div class="inside">
						<?php
						if ( isset( $_POST['purchase_code'] ) && ! empty( $_POST['purchase_code'] ) ) {
							$update_server = 'https://updates.themencode.com/offerlinkx/register-purchase.php';
							$purchase_code = sanitize_text_field( $_POST['purchase_code'] );
							$site_url      = site_url();

							$response = wp_remote_post(
								$update_server,
								array(
									'method'      => 'POST',
									'timeout'     => 45,
									'redirection' => 5,
									'httpversion' => '1.0',
									'blocking'    => true,
									'headers'     => array(),
									'body'        => array(
										'site'          => $site_url,
										'purchase_code' => $purchase_code,
									),
									'cookies'     => array(),
								)
							);

							if ( is_wp_error( $response ) ) {
								$error_message          = $response->get_error_message();
								$display_result_message = "<span style='color: red;'>Something went wrong: " . esc_html( $error_message ) . ' </span>';
							} else {
								if ( $response['response']['code'] == '200' ) {
									$decoded_resp = json_decode( $response['body'] );
									if ( $decoded_resp->status == 'success' ) {
										update_option( 'offerlinkx_sitekey', sanitize_text_field( $decoded_resp->sitekey ), $autoload = null );
										update_option( 'offerlinkx_purchase_code', sanitize_text_field( $decoded_resp->purchase_code ), $autoload = null );
										$display_result_message = '<span style="color: green;">' . esc_html( $decoded_resp->message ) . '</span>';
									} else {
										$display_result_message = '<span style="color: red;">' . esc_html( $decoded_resp->message ) . '</span>';
									}
								}
							}
						}
						$get_sitekey = get_option( 'offerlinkx_sitekey' );
						if ( ! empty( $get_sitekey ) ) {
							echo wp_kses( "<h3 style='color:green;font-weight: bold;text-align: center;'>Congratulations! Your copy of OfferLinkX is registered.</h3>", 'post' );

							echo wp_kses( "<p><a id='reregister' href='#'>Click here</a> if you need to change the purchase code or register again</p>", 'post' );

							$reg_style = 'display: none;';
						} else {
							$reg_style = 'display: block;';
						}
						?>
						<div class="register-offerlinkx" style="<?php echo esc_attr( $reg_style ); ?>" id="register-offerlinkx">
						<?php echo wp_kses( '<p>Please enter your purchase key below to register your copy of OfferLinkX to get automatic updates. If you do not have a purchase code yet, you can get that by clicking <a href="https://codecanyon.net/item/offerlinkx-woocommerce-request-a-quote/33422401/" target="_blank">here</a>. <br><br /><strong>Please note that, Every license/purchase key of OfferLinkX is valid for only one site.</strong> <br /></p>', 'post' ); ?>
						

							<div class="form">
								<form action="" method="POST">
									<input type="text" size="60" name="purchase_code" placeholder="<?php echo esc_attr__( 'Enter your envato purchase code', 'offerlinkx' ); ?>" required /> <br><br />
									<a href="https://codecanyon.net/item/offerlinkx-woocommerce-request-a-quote/33422401/support/" target="_blank"><?php esc_html_e( 'Click here', 'offerlinkx' ); ?></a> <?php esc_html_e( 'to go to codecanyon product page to get purchase code', 'offerlinkx' ); ?> <br><br />

									<input type="submit" value="<?php echo esc_attr__( 'Register OfferLinkX', 'offerlinkx' ); ?>" class="button button-primary" />
								</form>
							</div>
						</div>

						<h3 style="text-align: center;">
							<?php
							if ( ! empty( $display_result_message ) ) {
								echo wp_kses( $display_result_message, array( 'span' => array( 'style' => array() ) ) );
							}
							?>
						</h3>
					</div><!--/.inside--> 
				</div><!--/.postbox-->

				<?php
				$get_site_key = get_option( 'offerlinkx_sitekey' );
				if ( ! empty( $get_site_key ) ) {
					?>
				<div class="postbox">
					<h3><?php esc_html_e( 'De-register This Site', 'offerlinkx' ); ?></h3>
					<div class="inside">
						<?php
						if ( isset( $_POST['deregister_site'] ) && ! empty( $_POST['deregister_site'] ) ) {
							$deregister_server = 'https://updates.themencode.com/offerlinkx/deregister-purchase.php';

							$dereg_response = wp_remote_post(
								$deregister_server,
								array(
									'method'      => 'POST',
									'timeout'     => 45,
									'redirection' => 5,
									'httpversion' => '1.0',
									'blocking'    => true,
									'headers'     => array(),
									'body'        => array(
										'site'    => site_url(),
										'sitekey' => $get_site_key,
									),
									'cookies'     => array(),
								)
							);

							if ( is_wp_error( $dereg_response ) ) {
								$dereg_error_message          = esc_html( $dereg_response->get_error_message() );
								$display_dereg_result_message = "<span style='color: red;'>Something went wrong: $dereg_error_message </span>";
							} else {
								if ( $dereg_response['response']['code'] == '200' ) {
									$decoded_dereg_resp = json_decode( $dereg_response['body'] );
									if ( $decoded_dereg_resp->status == 'success' ) {
										update_option( 'offerlinkx_sitekey', '' );
										update_option( 'offerlinkx_purchase_code', '' );
										$display_dereg_result_message = '<span style="color: red;">' . $decoded_dereg_resp->message . '</span>';
									} else {
										update_option( 'offerlinkx_sitekey', '' );
										update_option( 'offerlinkx_purchase_code', '' );

										$display_dereg_result_message = '<span style="color: red;">Successfully Deregistered.</span>';
									}
								}
							}
						}

						?>
						<div class="deregister-offerlinkx" id="deregister-offerlinkx">
							<?php
							echo wp_kses(
								'<p>Please click on the button below to de-register this site from OfferLinkX Updates.<strong>Every license of OfferLinkX is valid for only one site.</strong> If you need additional license keys for OfferLinkX, you can get that by clicking <a href="https://codecanyon.net/item/offerlinkx-woocommerce-request-a-quote/33422401" target="_blank">here</a> <br> <br />
                            <strong style="color: red;">Please note, You won\'t receive one click updates anymore after deregistering this site.</strong>',
								'post'
							);
							?>
							
						</p>
						

							<div class="form">
								<form action="" method="POST">
									<input type="hidden" name="deregister_site" value="yes" />

									<input type="submit" value="<?php echo esc_html__( 'De-Register PDF Viewer for WordPress', 'offerlinkx' ); ?>" class="button button-warning" style="background: red;color: #fff;" />
								</form>
							</div>
						</div>

						<h3 style="text-align: center;">
						<?php
						if ( ! empty( $display_dereg_result_message ) ) {
							echo wp_kses( $display_dereg_result_message, array( 'span' => array( 'style' => array() ) ) ); }
				}
				?>
						 </h3>
					</div><!--/.inside--> 
				</div><!--/.postbox-->
				<?php }; ?>
			</div> <!-- column left -->
			
			<div class="tnc-offerlinkx-column-right">
				<div class="postbox">
					<h3><?php esc_html_e( 'Useful Resources', 'offerlinkx' ); ?></h3>
					<div class="inside">
						<ul>
							<li><a href="https://codecanyon.net/item/offerlinkx-woocommerce-request-a-quote/33422401"><?php esc_html_e( 'Codecanyon Plugin Page', 'offerlinkx' ); ?></a></li>
							<li><a href="https://offerlinkx.themencode.com/"><?php esc_html_e( 'Plugin Live Demo', 'offerlinkx' ); ?></a></li>
							<li><a href="https://themencode.support-hub.io/knowledgebase/998"><?php esc_html_e( 'Codecanyon Plugin Page', 'offerlinkx' ); ?></a></li>
							<li><a href="http://youtube.com/channel/UC0mkhMK6fTx1BCovV6M_E4w"><?php esc_html_e( 'Video Documentations', 'offerlinkx' ); ?></a></li>
							<li><a href="https://themencode.support-hub.io/"><?php esc_html_e( 'HelpDesk', 'offerlinkx' ); ?></a></li>
						</ul>
					</div><!--/inside--> 
				</div><!--/.postbox-->

				<!--/.postbox other_plugins -->
				<!-- Subscribe -->
				<div class="postbox">
					<h3><?php esc_html_e( 'Stay Updated with Latest Products and News from ThemeNcode', 'offerlinkx' ); ?></h3>
					<div class="inside">
						<div class="tnp tnp-subscription">
							<?php
							echo wp_kses(
								'<iframe src="https://eepurl.com/hx1A6H" width="100%" height="550"></iframe>',
								array(
									'iframe' => array(
										'width'  => array(),
										'height' => array(),
									),
								)
							);
							?>
						</div><!--/.newsletter--> 
					</div><!--/.inside --> 
				</div><!-- /.postbox Subscribe End -->
			</div> <!-- tnc-offerlinkx-column-right -->
		</div> <!-- postbody -->
	</div><!--poststuff-->
</div><!--/.wrap-->
