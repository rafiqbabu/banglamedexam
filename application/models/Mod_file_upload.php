<?php

/**
 * Description of FileUploadModel
 *
 * @author Nahian
 */
class Mod_file_upload extends CI_Model {

    private $default_path;

    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->default_path = "upload/";
    }

    public function upload_file($folder = NULL, $target, $conditions = array(), $id = NULL, $type = 'jpg|jpeg|png') {

        $up_path = $this->default_path . $folder;

        if (!file_exists($up_path)) {
            mkdir($up_path, 0777, TRUE);
        }

        $config['upload_path'] = $up_path;
        $config['allowed_types'] = $type;
        $config['max_size'] = $conditions['size'] ? $conditions['size'] : '1000';
        //$config['max_width'] = $conditions['width'] ? $conditions['width'] : '1000';
        //$config['max_height'] = $conditions['height'] ? $conditions['height'] : '1000';
        $config['overwrite'] = FALSE;
        
        if($id){
            $config['file_name'] = $id;
        } else {
            $config['encrypt_name'] = TRUE;
        }
        $file = array('status' => FALSE);

        $this->upload->initialize($config);
        if ($_FILES[$target]['size'] > 0) {
            if ($this->upload->do_upload($target)) {
                $file['status'] = TRUE;
                $arr =  $this->upload->data();
               // print_r($arr);
                $file['path'] = $up_path . '/' .$arr['file_name'];
            } else {
                $file['msg'] = $this->upload->display_errors();
            }
        }
        return $file;
    }

    public function multi_upload($folder, $target, $type = 'jpg|jpeg|png') {

        $up_path = $this->default_path . $folder;

        if (!file_exists($up_path)) {
            mkdir($up_path, 0777, TRUE);
        }

        $config['upload_path'] = $up_path;
        $config['allowed_types'] = $type;
        $config['max_size'] = '10000';
        $config['max_width'] = '4000';
        $config['max_height'] = '4000';

        $this->upload->initialize($config);

        $files = $_FILES[$target];

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = $image;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $images[$key]['status'] = TRUE;
                $images[$key]['path'] = $up_path . '/' . $this->upload->data()['file_name'];
            } else {
                $images[$key]['status'] = FALSE;
                $images[$key]['msg'] = $this->upload->display_errors();
            }
        }
        return $images;
    }

    public function resizeImage($path) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 1000;
        $config['height'] = 800;

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            $this->session->set_flashdata('type', 'danger');
            $this->session->set_flashdata('msg', $this->image_lib->display_errors());
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function waterMark($path) {
        $config['source_image'] = $path;
        $config['wm_text'] = '';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './assets/frontpages/fonts/NotoSans-Italic.ttf';
        $config['wm_font_size'] = '8';
        $config['wm_font_color'] = 'efefef';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'left';
        $config['wm_vrt_offset'] = '-20';
        $config['wm_hor_offset'] = '20';

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->watermark()) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
