<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 19/08/16
 * Time: 3:39 PM
 */

namespace Test;

use PdfInfo;
use PHPUnit_Framework_TestCase;

class PdfInfoTest extends PHPUnit_Framework_TestCase
{


    function testFile() {
        $p = new PdfInfo(__DIR__.'/../../example/QantasCashAU_Verification.pdf');
        $this->isInstanceOf('PdfInfo',$p);
        $this->isInstanceOf('PdfInfoBox',$p->cropBox);
        $this->assertEquals(595.28,$p->cropBox->right);
        $this->assertEquals(1,$p->pages);



    }

    function testFile2() {
        $p = new PdfInfo(__DIR__.'/../../example/SampleQuestions.pdf');
        $this->isInstanceOf('PdfInfo',$p);
        $this->isInstanceOf('PdfInfoBox',$p->cropBox);
        $this->assertEquals(612,$p->cropBox->right);
        $this->assertEquals(32,$p->pages);



    }



}
