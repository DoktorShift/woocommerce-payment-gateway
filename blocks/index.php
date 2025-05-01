<?php
namespace LNbitsSatsPayPlugin\Blocks;

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class LNbitsPaymentMethod extends AbstractPaymentMethodType {
    protected $name = 'lnbits';

    public function initialize() {
        $this->settings = get_option('woocommerce_lnbits_settings', []);
    }

    public function is_active() {
        return ! empty($this->settings['enabled']) && 'yes' === $this->settings['enabled'];
    }

    public function get_payment_method_script_handles() {
        wp_register_script(
            'lnbits-blocks-integration',
            plugins_url('blocks/build/index.js', dirname(__FILE__)),
            ['wc-blocks-registry', 'wc-settings', 'wp-element', 'wp-html-entities', 'wp-i18n'],
            null,
            true
        );
        return ['lnbits-blocks-integration'];
    }

    public function get_payment_method_data() {
        return [
            'title' => $this->settings['title'] ?? __('Pay with Bitcoin with LNbits', 'woocommerce'),
            'description' => $this->settings['description'] ?? __('You can use any Bitcoin wallet to pay. Powered by LNbits.', 'woocommerce'),
            'supports' => $this->get_supported_features(),
        ];
    }

    public function get_supported_features() {
        return [
            'products',
        ];
    }
} 