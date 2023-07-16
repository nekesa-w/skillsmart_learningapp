<?php

namespace App\Models;

use CodeIgniter\Model;

class ParagraphModel extends Model
{
    protected $table = 'tbl_paragraphs';
    protected $primaryKey = 'paragraph_id';
    protected $allowedFields = ['level_id', 'content'];

    function AllParagraphDetails()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_paragraphs');
        $builder->select('*');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function ParagraphContent($paragraph_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_paragraphs');
        $builder->select('*');
        $builder->where('tbl_paragraphs.paragraph_id', $paragraph_id);
        $builder->join('tbl_levels', 'tbl_levels.level_id = tbl_paragraphs.level_id');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function ParagraphDetailsById($paragraph_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_paragraphs');
        $builder->select('*');
        $builder->where('tbl_paragraphs.paragraph_id', $paragraph_id);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    function DeleteParagraph($paragraph_id)
    {
        $db      = \Config\Database::connect();

        $builder = $db->table('tbl_paragraphs');
        $builder->where('tbl_paragraphs.paragraph_id', $paragraph_id);
        $builder->delete();
    }
}
