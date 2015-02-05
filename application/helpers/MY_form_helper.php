<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
* Form Value
*
* Grabs a value from the POST array for the specified field so you can
* re-populate an input field or textarea.  If Form Validation
* is active it retrieves the info from the validation class
*
* @access   public
* @param   string
* @return   mixed
*/
if (!function_exists('set_value')) {
 
        function set_value($field = '', $default = '') {
                $OBJ = & _get_validation_object();
 
                if ($OBJ === TRUE && isset($OBJ->_field_data[$field])) {
                        return form_prep($OBJ->set_value($field, $default));
                } else {
                        if (!isset($_POST[$field])) {
                                return $default;
                        }
 
                        return form_prep($_POST[$field]);
                }
        }
 
}
 
if (!function_exists('set_checkbox')) {
 
        function set_checkbox($field = '', $value = '', $default = '') {
                $OBJ = & _get_validation_object();
 
                if ($OBJ === TRUE && isset($OBJ->_field_data[$field])) {
                        return form_prep($OBJ->set_checkbox($field, $value, $default));
                } else {
                        if (!isset($_POST[$field])) {
                                return '';
                        }
                        else{
                                if($_POST[$field] == $value)
                                {
                                        return 'checked=\'checked\'';
                                }
                        }
                }
        }
 
}
 
/* End of file MY_form_helper.php */
/* Location: ./application/core/MY_form_helper.php */  
 