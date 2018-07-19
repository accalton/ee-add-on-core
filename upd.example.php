<?php

class Example_upd {

    var $version = '';

    function install()
    {
        $data = array(
            'module_name' => '',
            'module_version' => $this->version,
            'has_cp_backend' => '',
            'has_publish_fields' => ''
        );

        ee()->db->insert('modules', $data);

        return true;
    }

    function update($current = '')
    {
        if (version_compare($current, '', '='))
        {
            return FALSE;
        }

        if (version_compare($current, '', '<'))
        {
            // todo: Update code goes here
        }

        return TRUE;
    }

    function uninstall()
    {
        ee()->db->where('module_name', '');
        ee()->db->delete('modules');

        return TRUE;
    }
}