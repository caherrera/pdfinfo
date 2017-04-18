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
        $this->assertFalse($p->isError());



    }

    function testFile2() {
        $p = new PdfInfo(__DIR__ . '/../../example/Sample Questions.pdf');
        $this->isInstanceOf('PdfInfo',$p);
        $this->isInstanceOf('PdfInfoBox',$p->cropBox);
        $this->assertEquals(612,$p->cropBox->right);
        $this->assertEquals(32,$p->pages);
        $this->assertFalse($p->isError());



    }

    function testFile3() {
        $p = new PdfInfo(__DIR__ . '/../../example/corrupted.pdf');
        $this->isInstanceOf('PdfInfo',$p);
        $this->assertTrue($p->isError());




    }



}
