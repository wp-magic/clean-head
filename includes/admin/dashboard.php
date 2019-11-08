<?php
/**
 * Provices an admin dashboard to this plugin
 *
 * @package MagicCleanHead
 * @since 0.0.1
 */

add_action(
	'admin_menu',
	function () {
		$title = 'Magic Clean Head Settings';

		$settings = array();

		foreach ( MAGIC_CLEAN_HEAD_OPTIONS as $key => $label ) {
			array_push(
				$settings,
				array(
					'name'    => $key,
					'type'    => 'checkbox',
					'default' => false,
					'label'   => $label,
				)
			);
		}

		magic_dashboard_add_submenu_page(
			array(
				'link'     => 'Clean Head',
				'slug'     => MAGIC_CLEAN_HEAD_SLUG,
				'title'    => $title,
				'settings' => $settings,
			)
		);
	},
	2
);
