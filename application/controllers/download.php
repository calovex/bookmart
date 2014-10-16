<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

    public function product($product_id = 0, $file_name = '')
    {
        $user_id    = $this->session->userdata('user_id');
        $user_type  = $this->session->userdata('user_type');
        $logged_in  = $this->session->userdata('logged_in');

        if($product_id == 0)
        {
            exit();
        }

        if($logged_in)
        {
            if($user_type != 'admin')
            {
                $this->load->model('model_download');
                $has_access = $this->model_download->has_access($user_id, $product_id, $file_name);
            }
            else
            {
                $has_access = true;
            }

            if($has_access)
            {
                //make sure no one is trying to inject anything funny
                $file_name = str_replace('/','',$file_name);  //prevent file path manipulation
                $file_name = str_replace('%00','',$file_name); //prevent null char injector

                $file = EBOOKS_PATH.$file_name;

                if (file_exists($file))
                {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    ob_clean();
                    flush();
                    readfile($file);
                    exit;
                }
            }
        }
    }

}

/* End of file download.php */
/* Location: ./application/controllers/download.php */
