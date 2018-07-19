<?php

class Example_ext {

    var $name           = '';
    var $version        = '1.0.0';
    var $description    = '';
    var $settings_exist = '';
    var $docs_url       = '';

    var $settings = array();

    var $hooks_and_methods = array(
        '' => ''
    );

    function __construct($settings = '')
    {
        $this->settings = $settings;
    }

    function activate_extension()
    {
        $this->settings = array();

        foreach ($this->hooks_and_methods as $hook => $method) {
            $data = array(
                'class'     => __CLASS__,
                'method'    => $method,
                'hook'      => $hook,
                'settings'  => serialize($this->settings),
                'priority'  => 10,
                'version'   => $this->version,
                'enabled'   => 'y'
            );

            ee()->db->insert('extensions', $data);
        }
    }

    function update_extension($current = '')
    {
        if ($current == '' OR $current == $this->version)
        {
            return FALSE;
        }

        if ($current < '1.0.0')
        {
            // Update to version 1.0.0
        }

        ee()->db->where('class', __CLASS__);
        ee()->db->update(
                    'extensions',
                    array('version' => $this->version)
        );
    }

    function disable_extension()
    {
        ee()->db->where('class', __CLASS__);
        ee()->db->delete('extensions');
    }
}