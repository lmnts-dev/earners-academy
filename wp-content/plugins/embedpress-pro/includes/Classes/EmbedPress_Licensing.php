<?php
namespace Embedpress\Pro\Classes;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Handles license input and validation
 */
class EmbedPress_Licensing {
	private $product_slug;
	private $text_domain;
	private $product_name;
	private $item_id;

	/**
	 * Initializes the license manager client.
	 * @param $product_slug
	 * @param $product_name
	 * @param $text_domain
	 */
	public function __construct( $product_slug, $product_name, $text_domain ) {
		// Store setup data
		$this->product_slug         = $product_slug;
		$this->product_name         = $product_name;
		$this->item_id              = EMBEDPRESS_SL_ITEM_ID;

		// Init
		$this->add_actions();
	}
	/**
	 * Adds actions required for class functionality
	 */
	public function add_actions() {
		if ( is_admin() ) {
			// Add the menu screen for inserting license information
			//add_action( 'admin_init', array( $this, 'register_license_settings' ) );
			add_action( 'admin_init', array( $this, 'activate_license' ) );
			add_action( 'admin_init', array( $this, 'deactivate_license' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
			add_action( 'embedpress_license_tab', array( $this, 'render_licenses_tab' ) );
			add_action( 'embedpress_license', array( $this, 'render_licenses_page' ) );

		}
	}

	/**
	 * @return string   The slug id of the licenses settings page.
	 */
	protected function get_settings_page_slug() {
		return 'embedpress&page_type=license';
	}

	/**
	 * Creates the settings fields needed for the license settings menu.
	 */
	public function register_license_settings() {
		// creates our settings in the options table
		register_setting( $this->get_settings_page_slug(), $this->product_slug . '-license-key', 'sanitize_license' );
	}

	public function sanitize_license( $new ) {
		$old = get_option( $this->product_slug . '-license-key' );
		if ( $old && $old != $new ) {
			delete_option( $this->product_slug . '-license-status' ); // new license has been entered, so must reactivate
		}
		return $new;
	}

	/**
	 * Handles admin notices for errors and license activation
	 *
	 * @since 0.1.0
	 */

	public function admin_notices() {
		$status = $this->get_license_status();
		$license_data = $this->get_license_data();

		if( isset( $license_data->license ) ) {
			$status = $license_data->license;
		}

		if( $status === 'http_error' ) {
			return;
		}

		if ( ( $status === false || $status !== 'valid' ) && $status !== 'expired' ) {
			$msg = __( 'Please %1$sactivate your license%2$s key to enable updates for %3$s.', 'embedpress-pro' );
			$msg = sprintf( $msg, '<a href="' . admin_url( 'admin.php?page=' . $this->get_settings_page_slug() ) . '">', '</a>',	'<strong>' . esc_html($this->product_name) . '</strong>' );
			?>
            <div class="notice notice-error">
                <p><?php echo wp_kses_post($msg); ?></p>
            </div>
			<?php
		}
		if ( $status === 'expired' ) {
			$msg = __( 'Your license has been expired. Please %1$srenew your license%2$s key to enable updates for %3$s.',	'embedpress-pro' );
			$msg = sprintf( $msg, '<a href="https://store.wpdeveloper.com">', '</a>', '<strong>' . $this->product_name . '</strong>' );
			?>
            <div class="notice notice-error">
                <p><?php echo wp_kses_post($msg); ?></p>
            </div>
			<?php
		}
		if ( ( isset( $_GET['sl_activation'] ) || isset( $_GET['sl_deactivation'] ) ) && ! empty( $_GET['message'] ) ) {
			$target = isset( $_GET['sl_activation'] ) ? $_GET['sl_activation'] : null;
			$target = is_null( $target ) ? ( isset( $_GET['sl_deactivation'] ) ? $_GET['sl_deactivation'] : null ) : null;
			switch( $target ) {
				case 'false':
					$message = urldecode( $_GET['message'] );
					?>
                    <div class="error">
                        <p><?php echo wp_kses_post($message); ?></p>
                    </div>
					<?php
					break;
				case 'true':
				default:
					// Developers can put a custom success message here for when activation is successful if they way.
					break;

			}
		}
	}

	/**
	 * Renders the settings page for entering license information.
	 */
	public function render_licenses_page() {
		$license_key 	= $this->get_license_key();
		$status 		= $this->get_license_status();
		//$status 		= 'valid';
		//$status = false; // @TODO; remove after testing
		?>

        <div class="embedpress-license__details radius-25 o-hidden">
            <div class="license__content">


	            <?php if( $status == false && $status !== 'valid' ) { ?>
                    <div class="thumb__area">
                        <img src="<?php echo EMBEDPRESS_SETTINGS_ASSETS_URL; ?>img/unlock-license.svg" alt="">
                        <h2><?php esc_html_e( "Just one more step to go!", "embedpress-pro" ); ?></h2>
                    </div>
                    <p><?php esc_html_e( "Enter your license key here, to activate EmbedPress Pro, and get automatic updates and premium support.", "embedpress-pro" ); ?> <?php
			            /** Translator: % : https://embedpress.com/docs/embedpress-pro-license/ */
			            printf( __( 'Visit the <a href="%s" target="_blank">Validation Guide</a> for help.', 'embedpress-pro' ), 'https://embedpress.com/docs/embedpress-pro-license/' ); ?>
                    </p>
                    <ol>
                        <li><?php printf( __( 'Log in to <a href="%s" target="_blank">your account</a> to get your license key.', 'embedpress-pro' ), 'https://store.wpdeveloper.com/' ); ?></li>
                        <li><?php printf( __( 'If you don\'t yet have a license key, get <a href="%s" target="_blank">EmbedPress Pro now</a>.', 'embedpress-pro' ), 'https://embedpress.com/#pricing' ); ?></li>
                        <li><?php _e( __( 'Copy the license key from your account and paste it below.', 'embedpress-pro' ) ); ?></li>
                        <li><?php _e( __( 'Click on <strong>"Activate License"</strong> button.', 'embedpress-pro' ) ); ?></li>
                    </ol>
	            <?php } ?>


	            <?php if( $status !== false && $status == 'valid' ) { ?>
                    <div class="validated-feature-list">
                        <div class="validated-feature-list-item">
                            <div class="validated-feature-list-icon">
                                <img src="<?php echo EMBEDPRESS_PRO_PLUGIN_URL . 'assets/admin/images/icon-auto-update.svg'; ?>" alt="embedpress-auto-update">
                            </div>
                            <div class="validated-feature-list-content">
                                <h4><?php _e( 'Auto Update','embedpress-pro' );?></h4>
                                <p>
						            <?php _e( 'Update the plugin right from your WordPress Dashboard.','embedpress-pro' );?>
                                </p>
                            </div>
                        </div><!--./feature-list-item-->
                        <div class="validated-feature-list-item">
                            <div class="validated-feature-list-icon">
                                <img src="<?php echo EMBEDPRESS_PRO_PLUGIN_URL . 'assets/admin/images/premium-support.svg'; ?>" alt="embedpress-auto-update">
                            </div>
                            <div class="validated-feature-list-content">
                                <h4><?php _e('Premium Support', 'embedpress-pro'); ?></h4>
                                <p><?php _e('Supported by professional and courteous staff.', 'embedpress-pro'); ?></p>
                            </div>
                        </div><!--./feature-list-item-->
                    </div><!--./feature-list-->
	            <?php } ?>

                <form action="" method="post"  class="form__inline">
					<?php
					do_action( 'embedpress_before_license_settings_fields');
					?>
                    <div class="form__group">
	                    <?php if( $status == false && $status !== 'valid' ) { ?>
                            <span class="input__icon"><i class="ep-icon ep-lock"></i></span>
	                    <?php } ?>
	                    <?php if( $status !== false && $status == 'valid' ) { ?>
                            <img class="input__icon" src="<?php echo EMBEDPRESS_PRO_PLUGIN_URL . 'assets/admin/images/icon-license-valid.svg'; ?>" alt="embedpress-licnese">
	                    <?php } ?>
                        <input <?php echo ( $status !== false && $status == 'valid' ) ? 'disabled' : ''; ?> id="<?php echo esc_attr($this->product_slug); ?>-license-key" name="<?php echo esc_attr($this->product_slug); ?>-license-key" type="text" class="form__control" value="<?php echo esc_attr( self::get_hidden_license_key() ); ?>" placeholder=" <?php esc_attr_e( 'Place Your License Key and Activate','embedpress-pro' );?>" required />
                    </div>
					<?php do_action( 'embedpress_after_license_settings_fields'); ?>

                    <!--License Button STARTS-->
	                <?php
                    wp_nonce_field( $this->product_slug . '_license_nonce', $this->product_slug . '_license_nonce' );
	                if( $status !== false && $status == 'valid' ) { ?>
                        <input type="hidden" name="action" value="eae_pro_deactivate_license"/>
                        <input type="hidden" name="<?php echo esc_attr($this->product_slug); ?>_license_deactivate" />
                        <button class="button radius-10 embedpress-license-deactivation-btn" name="submit" value="deactivate_license"><?php esc_html_e( 'Deactivate License', 'embedpress-pro'); ?></button>
	                <?php } else { ?>
                        <input type="hidden" name="<?php echo esc_attr($this->product_slug); ?>_license_activate" />
                        <button class="button button__themeColor radius-10 embedpress-license-activation-btn" name="submit" value="activate_license"><?php esc_html_e( 'Activate License', 'embedpress-pro'); ?></button>
	                <?php }
	                ?>
                    <!--License Button ENDS-->

                </form>
            </div>
            <div class="license__manage">
                <img src="<?php echo EMBEDPRESS_SETTINGS_ASSETS_URL; ?>img/logo.svg" alt="">
                <a href="https://store.wpdeveloper.com/" target="_blank" class="button radius-10"><?php esc_html_e( "Manage License", "embedpress-pro" ); ?></a>
            </div>
	        <?php
           $this->show_notification();
            ?>
        </div>
		<?php
	}

	public function render_licenses_tab($activeTab){
        ?>
            <a href="?page=embedpress&tab=embedpress_license"
               class="nav-tab<?php echo ($activeTab === 'embedpress_license' || empty( $activeTab )) ? ' nav-tab-active' : ''; ?> ">
                <?php esc_html_e( 'License', 'embedpress-pro'); ?>
            </a>
        <?php
    }

	/**
	 * Gets the current license status
	 *
	 * @return bool|string   The product license key, or false if not set
	 */
	public function get_license_status() {
		$status = get_option( $this->product_slug . '-license-status' );
		if ( ! $status ) {
			// User hasn't saved the license to settings yet. No use making the call.
			return false;
		}
		return trim( $status );
	}

	/**
	 * Gets the currently set license key
	 *
	 * @return bool|string   The product license key, or false if not set
	 */
	public function get_license_key() {
		$license = get_option( $this->product_slug . '-license-key' );
		if ( ! $license ) {
			// User hasn't saved the license to settings yet. No use making the call.
			return false;
		}
		return trim( $license );
	}


	/**
	 * Updates the license key option
	 *
	 * @param $license_key
	 * @return bool|string   The product license key, or false if not set
	 */
	public function set_license_key( $license_key ) {
		return update_option( $this->product_slug . '-license-key', $license_key );
	}

	private function get_hidden_license_key() {
		$input_string = $this->get_license_key();

		$start = 5;
		$length = mb_strlen( $input_string ) - $start - 5;

		$mask_string = preg_replace( '/\S/', '*', $input_string );
		$mask_string = mb_substr( $mask_string, $start, $length );
		$input_string = substr_replace( $input_string, $mask_string, $start, $length );

		return $input_string;
	}

	/**
	 * @param array $body_args
	 *
	 * @return \stdClass|\WP_Error
	 */
	private function remote_post( $body_args = [] ) {
		$api_params = wp_parse_args(
			$body_args,
			[
				'item_id' => urlencode( $this->item_id ),
				'url'     => home_url(),
			]
		);

		$response = wp_remote_post( EMBEDPRESS_STORE_URL, [
			'sslverify' => false,
			'timeout' => 40,
			'body' => $api_params,
		] );

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$response_code = wp_remote_retrieve_response_code( $response );
		if ( 200 !== (int) $response_code ) {
		    $message = wp_remote_retrieve_response_message($response);
		    $body = wp_remote_retrieve_body( $response );
			return new \WP_Error( $response_code, sprintf( __( 'HTTP Error: %s, %s, %s', 'embedpress-pro' ), $response_code, $message, $body) );
		}

		$data = json_decode( wp_remote_retrieve_body( $response ) );
		if ( empty( $data ) || ! is_object( $data ) ) {
			return new \WP_Error( 'no_json', __( 'An error occurred, please try again', 'embedpress-pro' ) );
		}

		return $data;
	}

	public function activate_license(){
		if( ! isset( $_POST[ $this->product_slug . '_license_activate' ] ) ) {
			return;
		}
		// run a quick security check
		if( ! check_admin_referer( $this->product_slug . '_license_nonce', $this->product_slug . '_license_nonce' ) ) {
			if ( wp_doing_ajax() ) {
				wp_send_json_error();
			}
			return;
		}

		// retrieve the license from the database
		$license = $_POST[ $this->product_slug . '-license-key' ];

		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
		);

		$license_data = $this->remote_post( $api_params );
		if( is_wp_error( $license_data ) ) {
			$message = $license_data->get_error_message();
		}

		if ( isset( $license_data->success ) && false === boolval( $license_data->success ) ) {

			switch( $license_data->error ) {

				case 'expired' :

					$message = sprintf(
						__( 'Your license key expired on %s.', 'embedpress-pro' ),
						date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
					);
					break;

				case 'revoked' :

					$message = __( 'Your license key has been disabled.' , 'embedpress-pro');
					break;

				case 'missing' :

					$message = __( 'Invalid license.', 'embedpress-pro' );
					break;

				case 'invalid' :
				case 'site_inactive' :

					$message = __( 'Your license is not active for this URL.', 'embedpress-pro' );
					break;

				case 'item_name_mismatch' :

					$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'embedpress-pro' ), EMBEDPRESS_SL_ITEM_NAME );
					break;

				case 'no_activations_left':

					$message = __( 'Your license key has reached its activation limit.' , 'embedpress-pro');
					break;

				default :

					$message = __( 'An error occurred, please try again.', 'embedpress-pro' );
					break;
			}

		}


		// Check if anything passed on a message constituting a failure
		$base_url = admin_url( 'admin.php?page=' . $this->get_settings_page_slug() );

		if ( ! empty( $message ) ) {
			if ( wp_doing_ajax() ) {
				wp_send_json_error(['message' => urlencode( esc_html($message) )]);
			}
			$redirect = add_query_arg( array( 'error' => 'true', 'sl_activation' => 'false', 'message' => urlencode( esc_html($message) ) ), $base_url );
			wp_redirect( $redirect );
			exit();
		}

		// $license_data->license will be either "valid" or "invalid"
        $license = $this->sanitize_license( $license);
		$this->set_license_key( $license );
		$this->set_license_data( $license_data );
		$this->set_license_status( $license_data->license );
		$message = esc_html__( 'License has been activated', 'embedpress-pro');
		$redirect = add_query_arg( array( 'success' => 'true', 'message' => urlencode( esc_html($message) ) ), $base_url );
		if ( wp_doing_ajax() ) {
			wp_send_json_success();
		}
		wp_redirect( $redirect );
		exit();

	}

	public function set_license_data( $license_data, $expiration = null ) {
		if ( null === $expiration ) {
			$expiration = 12 * HOUR_IN_SECONDS;
		}
		set_transient( $this->product_slug . '-license_data', $license_data, $expiration );
	}

	public function get_license_data( $force_request = false ) {
		$license_data = get_transient( $this->product_slug . '-license_data' );

		if ( false === $license_data || $force_request ) {

			$license = $this->get_license_key();

			if( empty( $license ) ) {
				return false;
			}

			$body_args = [
				'edd_action' => 'check_license',
				'license' => $this->get_license_key(),
			];

			$license_data = $this->remote_post( $body_args );

			if ( is_wp_error( $license_data ) ) {
				$license_data = new \stdClass();
				$license_data->license = 'valid';
				$license_data->payment_id = 0;
				$license_data->license_limit = 0;
				$license_data->site_count = 0;
				$license_data->activations_left = 0;
				$this->set_license_data( $license_data, 30 * MINUTE_IN_SECONDS );
				$this->set_license_status( $license_data->license );
			} else {
				$this->set_license_data( $license_data );
				$this->set_license_status( $license_data->license );
			}
		}

		return $license_data;
	}

	public function deactivate_license(){
		if( ! isset( $_POST[ $this->product_slug . '_license_deactivate' ] ) ) {
			return;
		}
		if( ! check_admin_referer( $this->product_slug . '_license_nonce', $this->product_slug . '_license_nonce' ) ) {
			if ( wp_doing_ajax() ) {
				wp_send_json_error(['message' => 'nonce did not match']);
			}
			return;
		}

		// retrieve the license from the database
		$license = $this->get_license_key();
		$transient = get_transient( $this->product_slug . '-license_data' );
		if( $transient !== false ) {
			$option = delete_option( '_transient_' . $this->product_slug . '-license_data' );
			if( $option ) {
				delete_option( '_transient_timeout_' . $this->product_slug . '-license_data' );
			}
		}

		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
		);

		$license_data = $this->remote_post( $api_params );

		if( is_wp_error( $license_data ) ) {
			$message = $license_data->get_error_message();
		}
		$base_url = admin_url( 'admin.php?page=' . $this->get_settings_page_slug() );
		if( ! empty( $message ) ) {
			$redirect = add_query_arg( array( 'error' => 'true', 'sl_activation' => 'false', 'message' => urlencode( esc_html($message) ) ), $base_url );
			if ( wp_doing_ajax() ) {
				wp_send_json_error(['message' => urlencode( esc_html($message) )]);
			}
			wp_redirect( $redirect );
			exit();
		}

		if( $license_data->license != 'deactivated' ) {
			$message = __( 'An error occurred, please try again', 'embedpress-pro' );
			$redirect = add_query_arg( array( 'error' => 'true', 'sl_deactivation' => 'false', 'message' => urlencode( esc_html($message) ) ), $base_url );
			if ( wp_doing_ajax() ) {
				wp_send_json_error(['message' => urlencode( esc_html($message) )]);
			}
			wp_redirect( $redirect );
			exit();
		}

		if( $license_data->license == 'deactivated' ) {
			delete_option( $this->product_slug . '-license-status' );
			delete_option( $this->product_slug . '-license-key' );
		}
		$message = esc_html__( 'License has been deactivated', 'embedpress-pro');
		$redirect = add_query_arg( array( 'success' => 'true', 'message' => urlencode( $message ) ), $base_url );
		if ( wp_doing_ajax() ) {
			wp_send_json_success();
		}
		wp_redirect( $redirect );
		exit();
	}

	/**
	 * Updates the license status option
	 *
	 * @param $license_status
	 * @return bool|string   The product license key, or false if not set
	 */
	public function set_license_status( $license_status ) {
		return update_option( $this->product_slug . '-license-status', $license_status );
	}

	public function show_notification() {

		if ( !empty( $_GET['message']) ) {
			$success_message = $error_message = $_GET['message'];
		}else{
			$success_message = "License updated"; // already translated by free version
			$error_message = "Ops! Something went wrong."; // already translated by free version
		}
        ?>

        <div class="embedpress-toast__message toast__message--success">
            <img src="<?php echo EMBEDPRESS_SETTINGS_ASSETS_URL; ?>img/check.svg" alt="">
            <p><?php echo esc_html( $success_message); ?></p>
        </div>

        <div class="embedpress-toast__message toast__message--error">
            <img src="<?php echo EMBEDPRESS_SETTINGS_ASSETS_URL; ?>img/error.svg" alt="">
            <p><?php echo esc_html( $error_message); ?></p>
        </div>

        <?php  if (!empty( $_GET['success'])){ ?>
        <script>
            (function ($) {
                let $success_message_node = $('.toast__message--success');
                $success_message_node.addClass('show');
                setTimeout(function (){
                    $success_message_node.removeClass('show');
                    let cleanUrl = embedPressRemoveURLParameter(location.href, 'success');
                        cleanUrl = embedPressRemoveURLParameter(cleanUrl, 'message');
                        cleanUrl = embedPressRemoveURLParameter(cleanUrl, 'sl_activation');
                    history.pushState('', '', cleanUrl );
                }, 5000);

            })(jQuery);
        </script>
        <?php  } elseif (!empty( $_GET['error'])){ ?>
                <script>
                    (function ($) {
                        let $error_message_node = $('.toast__message--error');
                        $error_message_node.addClass('show');
                        setTimeout(function (){
                            $error_message_node.removeClass('show');
                            let cleanUrl = embedPressRemoveURLParameter(location.href, 'sl_activation');
                            cleanUrl = embedPressRemoveURLParameter(cleanUrl, 'message');
                            cleanUrl = embedPressRemoveURLParameter(cleanUrl, 'sl_deactivation');
                            history.pushState('', '', cleanUrl );
                        }, 5000);

                    })(jQuery);
                </script>
                <?php
            }
	}
}
