<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ParagraphModel;
use App\Models\LevelModel;

class ParagraphController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function create_paragraph()
    {
        $paragraph = new ParagraphModel();
        $data['paragraphs'] = $paragraph->AllParagraphDetails();

        $levels = new LevelModel();
        $data['levels'] = $levels->AllLevelDetails();

        return view('admin/create_paragraph', $data);
    }

    public function admin_create_paragraph()
    {
        $string_level_id = $this->request->getPost('level_id');
        $content = $this->request->getPost('content');

        $level_id = (int)$string_level_id;

        $values = [
            'level_id' => $level_id,
            'content' => $content,
        ];

        $paragraphModel = new ParagraphModel();
        $query = $paragraphModel->insert($values);

        if (!$query) {
            return  redirect()->to('create_paragraph')->with('fail', 'Something went wrong. Paragraph was not created. Please try again.');
        } else {
            return  redirect()->to('view_paragraph')->with('success', 'Paragraph created successfully');
        }
    }

    public function view_paragraph()
    {
        $paragraph = new ParagraphModel();
        $data['paragraphs'] = $paragraph->AllParagraphDetails();

        return view('admin/view_paragraph', $data);
    }

    function updateparagraphgetId()
    {
        $paragraph_id = $this->request->getPost('update_paragraph');
        return redirect()->to(base_url() . 'update_paragraph/' . $paragraph_id);
    }

    public function update_paragraph()
    {
        $uri = current_url(true);
        $paragraph_id = $uri->getSegment(2);

        $paragraph = new ParagraphModel();
        $data['paragraphs'] = $paragraph->ParagraphContent($paragraph_id);

        $levels = new LevelModel();
        $data['levels'] = $levels->AllLevelDetails();

        return view('admin/update_paragraph', $data);
    }

    public function admin_update_paragraph()
    {
        $paragraph_id = $this->request->getPost('paragraph_id');
        $level_id = $this->request->getPost('level_id');
        $content = $this->request->getPost('content');

        $values = [
            'level_id' => $level_id,
            'content' => $content,
        ];

        $paragraphModel = new ParagraphModel();
        $updateparagraph = $paragraphModel->update($paragraph_id, $values);

        if ($updateparagraph) {
            return  redirect()->to('view_paragraph')->with('success', 'Paragraph updated successfully');
        } else {
            return  redirect()->to('view_paragraph')->with('fail', 'Something went wrong. Paragraph was not updated. Please try again.');
        }
    }

    function deleteparagraphgetId()
    {
        $paragraph_id = $this->request->getPost('delete_paragraph');
        return redirect()->to(base_url() . 'delete_paragraph/' . $paragraph_id);
    }

    public function delete_paragraph()
    {
        $uri = current_url(true);
        $paragraph_id = $uri->getSegment(2);

        $getparagraph = new ParagraphModel();
        $data['paragraphs'] = $getparagraph->ParagraphDetailsById($paragraph_id);

        return view('admin/delete_paragraph', $data);
    }

    public function admin_delete_paragraph()
    {
        $paragraph_id = $this->request->getPost('paragraph_id');

        $getparagraph = new ParagraphModel();
        $delete = $getparagraph->DeleteParagraph($paragraph_id);

        if ($delete) {
            return  redirect()->to('view_paragraph')->with('fail', 'Paragraph not deleted.');
        } else {
            return  redirect()->to('view_paragraph')->with('success', 'Paragraph was deleted successfully.');
        }
    }
}
