<?php
defined('BASEPATH') or exit('No direct script access allowed');

#[\AllowDynamicProperties]
class CI_Session_files_driver extends CI_Session_driver implements SessionHandlerInterface
{
    protected $_file_path;

    #[\ReturnTypeWillChange]
    public function open($save_path, $name)
    {
        $this->_save_path = $save_path;
        return true;
    }

    #[\ReturnTypeWillChange]
    public function close()
    {
        return true;
    }

    #[\ReturnTypeWillChange]
    public function read($session_id)
    {
        if (!is_file($this->_file_path . $session_id)) {
            return '';
        }

        return (string) file_get_contents($this->_file_path . $session_id);
    }

    #[\ReturnTypeWillChange]
    public function write($session_id, $session_data)
    {
        return (bool) file_put_contents($this->_file_path . $session_id, $session_data);
    }

    #[\ReturnTypeWillChange]
    public function destroy($session_id)
    {
        $file = $this->_file_path . $session_id;

        if (is_file($file)) {
            unlink($file);
        }

        return true;
    }

    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        foreach (glob($this->_file_path . '*') as $file) {
            if (filemtime($file) + $maxlifetime < time() && is_file($file)) {
                unlink($file);
            }
        }

        return true;
    }
}