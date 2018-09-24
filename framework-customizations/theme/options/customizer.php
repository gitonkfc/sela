
<?php if (!defined( 'FW' )) die('Forbidden');

$options = array(
    'section_1' => array(
        'title' => __('Unyson Section', '{domain}'),
        'options' => array(

            'option_1' => array(
                'type' => 'text',
                'value' => 'Default Value',
                'label' => __('Unyson Option', '{domain}'),
                'desc' => __('Option Description', '{domain}'),
            ),

        ),
    ),
);

$options = array(
    'panel_1' => array(
        'title' => __('Unyson Panel', '{domain}'),
        'options' => array(

            'section_1' => array(
                'title' => __('Unyson Section #1', '{domain}'),
                'options' => array(

                    'option_1' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #1', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                    ),

                ),
            ),

            'section_2' => array(
                'title' => __('Unyson Section #2', '{domain}'),
                'options' => array(

                    'option_2' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #2', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                    ),
                    'option_3' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #3', '{domain}'),
                        'desc' => __('Option Description', '{domain}'),
                    ),

                ),
            ),

        ),
    ),
);

$value = fw_get_db_customizer_option('option_1');