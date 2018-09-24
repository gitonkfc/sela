<?php
if (!function_exists('_action_theme_custom_framework_settings_menu')):
        function _action_theme_custom_framework_settings_menu($data) {
                add_menu_page(
                        __( 'Unyson', 'fw' ),
                        __( 'Unyson', 'fw' ),
                        $data['capability'],
                        $data['slug'],
                        $data['content_callback']
                );
        }
endif;
add_action('fw_backend_add_custom_settings_menu', '_action_theme_custom_framework_settings_menu');
