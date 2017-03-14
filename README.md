# pdfinfo

## Description
This is another version from parse pdfinfo from [howtomakeaturn/pdfinfo](https://github.com/howtomakeaturn/pdfinfo) adding -box details

## 1. Install pdfinfo

### Ubuntu
```
$ sudo apt install poppler-utils
```

### Centos
```
$ sudo yum install poppler
```

## 2. Usage
```
$pdfInfo = new PdfInfo(__DIR__.'/../../example/QantasCashAU_Verification.pdf');
```

# Reference

Currently this library supports the following metadata:

* title
* author
* creator
* producer
* creationDate
* modDate
* tagged
* form
* pages
* encrypted
* pageSize
* fileSize
* optimized
* PDFVersion
* mediaBox instance of PdfInfoBox
* cropBox instance of PdfInfoBox
* bleedBox instance of PdfInfoBox
* trimBox instance of PdfInfoBox
* artBox instance of PdfInfoBox

#### Properties for PdfInfoBox
* left
* right
* top
* bottom
* sizeX
* sizeY
* imageAspectRatio