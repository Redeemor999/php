<?php

namespace App\Controllers\Notes;

use \App\View;
use \Core\Validator;
USE \App\Model\Notes;

class NotesController
{
    public function index()
    {
        $userId = 1;

        $notes = Notes::showAll($userId);

        return View::make('/notes/index', [
            'heading' => 'My Notes:',
            'notes' => $notes
        ])->render();
    }

    public function note()
    {
        $id = $_GET['id'];
        
        $note = Notes::show($id);

        return View::make('/notes/note', [
            'heading' => $note,
        ])->render();
    }

    public function create()
    {
        $note = $_GET['note'] ?? '';

        return View::make('/notes/create', [
            'heading' => 'Create a Note:',
            'note' => $note ?? '',
            'errors' => $_GET['errors'] ?? ''
        ])->render();
    }

    public function store()
    {
        $note = htmlspecialchars($_POST['note']);
        
        Validator::string($note, 1, 500);
        
        $data['notes'] = ['user_id' => 1, 'note' => $note];

        // $this->crud->store($data);

        return header('location: /notes');
    }

    public function delete()
    {
        $row = intval($_POST['id']);
        $data['notes'] = ['id' => $row];

        // $this->crud->destroy($data);

        return header('location: /notes');
    }
}