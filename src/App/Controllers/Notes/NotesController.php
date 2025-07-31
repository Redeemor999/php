<?php

namespace App\Controllers\Notes;

use \App\Model\Notes;
use \Core\Validator;
use \Core\Source;
use \Core\Redirect;

class NotesController
{
    protected Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator;        
    }
    public function index()
    {
        $userId = 1;

        $notes = Notes::showAll($userId);

        return Redirect::to('/notes/index', [
            'heading' => 'My Notes:',
            'notes' => $notes
        ]);
    }

    public function note()
    {
        $id = $_GET['id'];
        
        $note = Notes::show($id);

        return Redirect::to('/notes/note', [
            'heading' => $note,
        ]);
    }

    public function create()
    {
        $note = $_GET['note'] ?? '';

        return Redirect::to('/notes/create', [
            'heading' => 'Create a Note:',
            'note' => $note ?? '',
            'errors' => $_GET['errors'] ?? ''
        ]);
    }

    public function store()
    {
        $note = Source::POST('note');

        if (! $this->validator->string($note, 1, 500)) {

            $errors = $this->validator->errors;

            return Redirect::to('/notes/create', [
                'heading' => 'Create a Note:',
                'errors' => $errors['note'],
                'note' => $note
            ]);
        }
        
        $data['notes'] = ['user_id' => 1, 'note' => $note];

        Notes::create($data);

        return Redirect::to('/notes');
    }

    public function delete()
    {
        $id = intval(Source::POST('id'));

        Notes::delete($id);

        return Redirect::to('/notes', [], 202);
    }

    public function edit()
    {
        $id = Source::POST('id');
        $note = Source::POST('note');

        return Redirect::to('/notes/edit', [
            'heading' => 'Edit Your Note:',
            'id' => $id,
            'note' => $note
        ]);
    }

    public function update()
    {
        $id = Source::POST('id');
        $note = Source::POST('note');

        if (! $this->validator->string($note, 1, 500)) {

            $errors = $this->validator->errors;

            return Redirect::to('/notes/edit', [
                'heading' => 'Edit Your Note:',
                'errors' => $errors['note'],
                'note' => $note
            ]);
        }

        Notes::patch($id);

        Redirect::to('/notes', [], 202);
    }
}