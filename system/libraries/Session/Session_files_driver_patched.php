<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#[\AllowDynamicProperties]
class CI_Session_files_driver extends CI_Session_driver implements SessionHandlerInterface {

    #[\ReturnTypeWillChange]
    public function open($save_path, $name)
    {
        // open logic
    }

    #[\ReturnTypeWillChange]
    public function close()
    {
        // close logic
    }

    #[\ReturnTypeWillChange]
    public function read($session_id)
    {
        // read logic
    }

    #[\ReturnTypeWillChange]
    public function write($session_id, $session_data)
    {
        // write logic
    }

    #[\ReturnTypeWillChange]
    public function destroy($session_id)
    {
        // destroy logic
    }

    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        // gc logic
    }
}