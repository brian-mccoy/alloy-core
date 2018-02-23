<?php
class Front_Page extends Core_Template {

	public function fields() {

		return core_get_fields( $this->obj_id, '', array(
			'hello'
		) );

	}

}
global $post;
new Front_Page( $post->ID );
