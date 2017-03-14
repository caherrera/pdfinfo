<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 14/03/17
 * Time: 5:11 PM
 */
class PdfInfo
{
    public $title = '';
    public $author = '';
    public $creator = '';
    public $producer = '';
    public $creationDate = '';
    public $modDate = '';
    public $tagged = '';
    public $userProperties = '';
    public $suspects = '';
    public $form = '';
    public $javascript = '';
    public $pages = '';
    public $encrypted = '';
    public $pageSize = '';
    public $pageRot = '';

    /**
     * @var PdfInfoBox
     */
    public $mediaBox;
    /**
     * @var PdfInfoBox
     */
    public $cropBox;
    /**
     * @var PdfInfoBox
     */
    public $bleedBox;
    /**
     * @var PdfInfoBox
     */
    public $trimBox;
    /**
     * @var PdfInfoBox
     */
    public $artBox;
    public $fileSize = '';
    public $optimized = '';
    public $pdfVersion = '';

    private $bin = '';
    private $filePath = '';

    private $map = [
        'Title' => 'title',
        'Author' => 'author',
        'Creator' => 'creator',
        'Producer' => 'producer',
        'CreationDate' => 'creationDate',
        'ModDate' => 'modDate',
        'Tagged' => 'tagged',
        'UserProperties' => 'userProperties',
        'Suspects' => 'suspects',
        'Form' => 'form',
        'JavaScript' => 'javascript',
        'Pages' => 'pages',
        'Encrypted' => 'encrypted',
        'Page size' => 'pageSize',
        'Page rot' => 'pageRot',
        'MediaBox' => 'mediaBox',
        'CropBox' => 'cropBox',
        'BleedBox' => 'bleedBox',
        'TrimBox' => 'trimBox',
        'ArtBox' => 'artBox',
        'File size' => 'fileSize',
        'Optimized' => 'optimized',
        'PDF version' => 'pdfVersion',


    ];


    function __construct($filePath = '', $bin = '')
    {

        if (!file_exists($filePath)) {
            throw new Exception('File does not exist');
        }
        $this->filePath = $filePath;

        if ($bin && file_exists($bin)) {
            $this->bin = $bin;

        } else {
            $this->bin = 'pdfinfo';
        }

        $this->pdfInfo();


    }


    private function pdfInfo()
    {
        $getPdfInfo = $this->bin . " -box " . $this->filePath;

        try {
            exec($getPdfInfo, $pdfInfos);
            if ($pdfInfos) {
                foreach ($pdfInfos as $info) {
                    preg_match('/(.*):\s+(.*)/', $info, $match);
                    $key = $match[1];
                    switch ($key) {
                        case 'CropBox':
                        case 'MediaBox':
                        case 'BleedBox':
                        case 'TrimBox':
                        case 'ArtBox':

                            $this->$key = new PdfInfoBox($match[2]);

                            break;
                        default:
                            $this->$key = $match[2];
                    }
                }

            }

        } catch (Exception $e) {
            return null;
        }

    }

    function __set($name, $value)
    {
        if (isset($this->map[$name])) {
            $key=$this->map[$name];
            $this->$key=$value;
        }

    }


}