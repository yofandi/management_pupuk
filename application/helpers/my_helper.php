<?php
	
	function load_modal($content, $name_mdl, $title, $size, $data = '')
	{
		$CI =& get_instance();
 		$isi['title_md'] = $title;
 		$isi['data'] = $data;
 		$view_content = $CI->load->view($content, $isi, TRUE);

		if ($content != '') {
		return '
		  <div class="modal fade" id="'.$name_mdl.'" aria-labelledby="'.$name_mdl.'" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-'.$size.'" role="document">
              <div class="modal-content">
                '.$view_content.'
              </div>
            </div>
          </div>
		';
		}
	}
?>