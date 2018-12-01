<?php

session_start();

$user=$_SESSION["user"];

require_once('tcpdf/tcpdf_import.php');


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'images/full_logo.png';
        $this->Image($image_file, 10, 10, 150, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 001');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// // set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// // remove default header/footer
// $pdf->setPrintHeader(false);
// $pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


// Set some content to print
$html = <<<EOD
<br>


<style type="text/css">
table, th, td {
    border: 1px solid black;
    
 } 
 .table_head{
     background-color:#3FAEA8;
     color:#fff;
 }
 .c {
    display: block;
margin: 0 auto;
width:200px;
height:100px;
} 
.container{

    width:100%;

}
img{
    margin:50px;
}

</style>

<h1 style="text-align:center">Application Form</h1>
<div class="container">
<br>


<hr>
<h2 >Personal Information</h2>
<div class="c" style="float:right;">
<img width="150px" height="100px"  src="uploads/photo/$user[65]" alt="photo">
<br/><br/><br/><br/><br/><br/><br/><br/>
<img style="float:right" width="150px" height="50px" src="uploads/sign/$user[66]" alt="photo">
</div>

<br>

    <table style="border:1px solid black">
        <tr class="table_head">
        <td>Email</td>
        <td>$user[0]</td>
        </tr>
        <tr>
        <td>Contact</td>
        <td>$user[4]</td>
        </tr>
        <tr>
        <td>First Name</td>
        <td>$user[6]</td>
        </tr>
        <tr>
        <td>Middle Name</td>
        <td>$user[7]</td>
        </tr>
        <tr>
        <td>Last Name</td>
        <td>$user[8]</td>
        </tr>
        <tr>
        <td>Date of Birth</td>
        <td>$user[9]</td>
        </tr>
        <tr>
        <td>Address</td>
        <td>$user[10]</td>
        </tr>
        <tr>
        <td>City</td>
        <td>$user[11]</td>
        </tr>
        <tr>
        <td>State</td>
        <td>$user[12]</td>
        </tr>
        <tr>
        <td>Pincode</td>
        <td>$user[13]</td>
        </tr>

    </table>

    </div>



<style>
table, th, td {
    border: 1px solid black;
 } 
 .table_head{
     background-color:#3FAEA8;
     color:#fff;
 }
</style>

<br>


<hr>
<h2> Educations Information</h2>

<table style="border:1px solid black">

<tr class="table_head">
<th>
        Exams &nbsp;
    </th>
    <th>
    Exam Passed &nbsp; 
    </th>
    <th>
        Specialization  &nbsp; 
    </th>
    <th>
        Board/College &nbsp; 
        </th>
        <th>
        Year of Passing &nbsp;
    </th>
    <th>
        Marks% &nbsp; 
    </th>
    <th>
        Regular / Distance 
</th>
</tr>

<tr>
    <td>
    Secondary
    </td>
    <td>
    $user[14]
    </td>
    <td>
    $user[15]
    </td>
    <td>
    $user[16]
    </td>
    <td>
    $user[17]
    </td>
    <td>
    $user[18]
    </td>
    <td>
    $user[19]
    </td>
</tr>

<tr>
    <td>
    UG
    </td>
    <td>
    $user[20]
    </td>
    <td>
    $user[21]
    </td>
    <td>
    $user[22]
    </td>
    <td>
    $user[23]
    </td>
    <td>
    $user[24]
    </td>
    <td>
    $user[25]
    </td>
</tr>

<tr>
    <td>
    PG
    </td>
    <td>
    $user[26]
    </td>
    <td>
    $user[27]
    </td>
    <td>
    $user[28]
    </td>
    <td>
    $user[29]
    </td>
    <td>
    $user[30]
    </td>
    <td>
    $user[31]
    </td>
</tr>


</table>


<br>
<br>
<hr>

<h2>Experience Details</h2>

<table>

<tr class="table_head">
<th>
        Organization
    </th>
    <th>
    Designation&nbsp; 
    </th>
    <th>
        From &nbsp; 
    </th>
    <th>
        To &nbsp; 
        </th>
        
    <th>
        Payscale &nbsp; 
    </th>
    <th>
        Reason of leaving&nbsp; 
</th>

<th>
        Experience in months&nbsp; 
</th>

<th>
        Nature of work&nbsp; 
</th>
</tr>



<tr>
    <td>
    $user[32]
    </td>
    <td>
    $user[33]
    </td>
    <td>
    $user[34]
    </td>
    <td>
    $user[35]
    </td>
    <td>
    $user[36]
    </td>
    <td>
    $user[37]
    </td>
    <td>
    $user[38]
    </td>
    <td>
    $user[39]
    </td>
</tr>


<tr>
    <td>
    $user[40]
    </td>
    <td>
    $user[41]
    </td>
    <td>
    $user[42]
    </td>
    <td>
    $user[43]
    </td>
    <td>
    $user[44]
    </td>
    <td>
    $user[45]
    </td>
    <td>
    $user[46]
    </td>
    <td>
    $user[47]
    </td>
</tr>



<tr>
    <td>
    $user[48]
    </td>
    <td>
    $user[49]
    </td>
    <td>
    $user[50]
    </td>
    <td>
    $user[51]
    </td>
    <td>
    $user[52]
    </td>
    <td>
    $user[53]
    </td>
    <td>
    $user[54]
    </td>
    <td>
    $user[55]
    </td>
</tr>



<tr>
    <td>
    $user[56]
    </td>
    <td>
    $user[57]
    </td>
    <td>
    $user[58]
    </td>
    <td>
    $user[59]
    </td>
    <td>
    $user[60]
    </td>
    <td>
    $user[61]
    </td>
    <td>
    $user[62]
    </td>
    <td>
    $user[63]
    </td>
</tr>


</table>



EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->AddPage();


$pdf->SetFont('times', '', 10, '', true);

// Set some content to print

$html = <<<EOD

<object width="400" height="400" data="uploads/cv/him@gm_cv.pdf"></object>
<iframe src="uploads/cv/him@gm_cv" style="width:718px; height:700px;" frameborder="0"></iframe>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

?>