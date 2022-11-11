<?

class MyOtherClass {

    function MyOtherfunction() {

        $CI =& get_instance();

        $row = $CI->db->get_where('setting', array('ip' => 1))->row();

        $CI->config->set_item('base_url', $row->base_url);

    }

}