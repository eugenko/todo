<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package     CodeIgniter
 * @subpackage  Rest Server
 * @category    Controller
 * @author      Phil Sturgeon
 * @link        http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Tasks extends REST_Controller
{
    public function todo_get()
    {
        if(! $this->get('id'))
        {
            $tasks = $this->task_model->get_all(); // return all record
        } else {
            $tasks = $this->task_model->get_task($this->get('id')); // return a record based on id
        }

        if($tasks)
        {
            $this->response($tasks, 200); // return success code if record exist
        // } else {
            // $this->response([], 404); // return empty
        }
    }

    public function todo_post()
    {
        if(! $this->post('title'))
        {
            $this->response(array('error' => 'Missing post data: title'), 400);
        }
        else{
            $data = array(
                'title' => $this->post('title')
            );
        }
        $new_id = $this->task_model->insert_task($data);
        if($new_id > 0)
        {
            $message = array('id' => $new_id, 'title' => $this->post('title'));
            $this->response($message, 200);
        }
    }

    public function todo_put()
    {
        if(! $this->put('title'))
        {
            $this->response(array('error' => 'Task title is required'), 400);
        }

        $data = array(
            'title'     => $this->put('title'),
            'status'    => $this->put('status')
        );
        $this->task_model->update_task($this->put('id'), $data);
        $message = array('success' => $this->put('title').' Updated!');
        $this->response($message, 200);
    }

    public function todo_delete($id=NULL)
    {
        if($id == NULL)
        {
            $message = array('error' => 'Missing delete data: id');
            $this->response($message, 400);
        } else {
            $this->task_model->delete_task($id);
            $message = array('id' => $id, 'message' => 'DELETED!');
            $this->response($message, 200);
        }
    }
}