<?php


function gambar_profile()
{
	$ci = get_instance();
	$gambar = $ci->session->userdata('gambar');

	if($gambar)
	{
		return base_url('uploads/user/') . $gambar;
	}else{
		return base_url('assets/img/avatar/avatar-1.png');
	}
}
