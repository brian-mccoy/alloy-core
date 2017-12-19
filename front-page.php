<?php
class Front_Page extends Core_Template {

}
global $post;
new Front_Page( $post->ID );
