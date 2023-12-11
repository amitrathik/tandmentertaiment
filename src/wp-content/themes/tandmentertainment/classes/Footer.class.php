<?php

class Footer{
	public function __constructor(){}

	public function get_contact_title(){
		return get_field('field_5966d799bbfdc','options');
		}
	
		public function get_contact_subtitle(){
		return get_field('field_5966d7b2bbfdd', 'options');
		}
	
		public function get_contact_email(){
		return get_field('field_5966d7e4bbfdf', 'options');
		}
	
		public function get_contact_phone(){
		return get_field('field_597543607b995', 'options');
		}
	
		public function get_social_media_title(){
		return get_field('field_59796b22728ef', 'options');
		}
	
		public function get_social_media_links(){
		return get_field('field_597969dec5d25', 'options');
		}
}
?>