<?php

session_start();

$user=$_SESSION["user"];
ob_start(); 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf_import.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = 'images/full_logo.png';

        $this->Image($image_file, 10, 10, 150, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
       
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

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
if ($user[25]=="Yes") {
    $var = "Post applied for: ".$user[26];
}
else{
	$var = "";
}
if ($user[27]=="Yes") {
    $var1 = " ".$user[26];
}
else{
	$var1 = "Type of Disability:".$user[27];
}

if ($user[135]!="") {
    $ol = " ".$user[135];
}
else{
	$ol = "   NA";
}

if ($user[125]!="") {
    $key = " ".$user[125];
}
else{
	$key = "   NA";
}
if ($user[127]!="") {
    $st = " ".$user[127];
}
else{
	$st = "   NA";
}
if ($user[128]!="") {
    $tu = " ".$user[128];
}
else{
	$tu = "   NA";
}


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);


// set font
$pdf->SetFont('times', 'BI', 12, 'true');

// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'BI', 10, 'true');

$pdf->Image('uploads/photo/'.$user[15],150, 70, 35, 45, 'JPG', 'http://www.tcpdf.org', '', true, 175, '', false, false, 1, false, false, false);

$pdf->Image('uploads/sign/'.$user[16],145, 150, 45,25 , 'JPG', 'http://www.tcpdf.org', '', true, 175, '', false, false, 1, false, false, false);
	

$html = <<<EOD
<head>
   
        <style type="text/css">

.table1 {
	width: 400px;
}

.table2 {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 3px #81C784;
        border-right: 3px  #81C784;
        border-top: 3px  #81C784;
        border-bottom: 3px  #81C784;
    }

td {
        border: 2px solid #3FAEA8;
        background-color: #fff;
        text-align: center;

    }

th {
        border: 2px solid #3FAEA8;
        background-color: #DCEDC8;
         text-align: center;

    }


        </style>

</head>

<body>

		
        <div class="col s12 m12"  style="margin-top:10px;float:left">
            <div>
            <h3 style="color:#3FAEA8;text-align:center"><b>Personal Information</b></h3>
            </div>
            <table class="table1 table2" cellspacing="4" cellpadding="8" border="2" >
        	
            <tr>
            <td class="th1">Email</td>
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
            <td>Gender</td>
            <td>$user[21]</td>
            </tr>
            <tr>
            <td>Marital Status</td>
            <td>$user[22]</td>
            </tr>
            <tr>
            <td>Category</td>
            <td>$user[23]</td>
            </tr>
            
        
            <tr>
            <td>Current Emp of IIIT-D ?  </td>
            <td>$user[24]</td>
            </tr>
            <tr>
            <td>Ever Interviewed by IIITD ? </td>
            <td>$user[25]<br>$var       
            </td>
            </tr>

            <tr>
            <td>Physical Disability </td>
            <td>$user[27]<br>$var1
		    </td>
            </tr>

            <tr>
            
            <td>Nationality</td>
            <td>$user[29]</td>
            </tr>

            <tr>
            <td>Domicile</td>
            <td>$user[30]</td>
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

     
        <br>
        
        </div>
</body>
</html>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'BI', 8, 'true');

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);




$html = <<<EOD
<style>

.table1 {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 1px #81C784;
        border-right: 1px  #81C784;
        border-top: 1px  #81C784;
        border-bottom: 1px  #81C784;
    }

td {
        border: 2px solid #3FAEA8;
        background-color: #fff;
        text-align: center;
        text-align: center;

    }

th {
        border: 2px solid #3FAEA8;
        background-color: #DCEDC8;
        text-align: center;

    }
</style>

<body>

		
        <div class="col s6 m6"  style="margin-top:10px;float:left">
            <div>
            <h2 style="color:#3FAEA8;text-align:center"><b>Educational Information</b></h2>
            </div>
            <table class="table1" cellspacing="4" cellpadding="4" border="1" >

        <tr class="table_head">
        <th width="80">Examination
            </th>
            <th width="80">Examination Passed 
            </th>
            <th width="160" >Specialization/Subjects
            </th>
            <th>Board/	Institute
             </th>
              <th width="50" >Year of Passing
            </th>
            <th width="50">Duration  (in years)
            </th>
            <th width="60">Marks(%)
            </th>
            <th width="60">
                Regular / Distance /  Part Time
        </th>
        </tr>

         <tr>
            <td>
            Secondary
            </td>
            <td>$user[32]
            </td>
            <td>$user[33]
            </td>
            <td>$user[34]
            </td>
            <td>$user[35]
            </td>
            <td>$user[36]
            </td>
            <td>$user[37]
            </td>
            <td>$user[38]
            </td>
        </tr>
        <tr>
            <td>
            Senior Secondary
            </td>
            <td>$user[41]
            </td>
            <td>$user[42]
            </td>
            <td>$user[43]
            </td>
            <td>$user[44]
            </td>
            <td>$user[45]
            </td>
            <td>$user[46]
            </td>
            <td>$user[47]
            </td>
        </tr>

        <tr>
            <td>
            UG
            </td>
            <td>$user[50]
            </td>
            <td>$user[51]
            </td>
            <td>$user[52]
            </td>
            <td>$user[53]
            </td>
            <td>$user[54]
            </td>
            <td>$user[55]
            </td>
            <td>$user[56]  
            </td>
        </tr>

        <tr>
            <td>
            PG
            </td>
            <td>$user[59]
            </td>
            <td>$user[60]
            </td>
            <td>$user[61] 
            </td>
            <td>$user[62] 
            </td>
            <td>$user[63]
            </td>
            <td>$user[64] 
            </td>
            <td>$user[65] 
            </td>
        </tr>
        <tr>
            <td>$user[67]
            </td>
            <td>$user[68]
            </td>
            <td>$user[69]
            </td>
            <td>$user[70]  
            </td>
            <td>$user[71]
            </td>
            <td>$user[72]  
            </td>
            <td>$user[73] 
            </td>
            <td>$user[74]  
            </td>
        </tr>
        <tr>
            <td>$user[76]
            </td>
            <td>$user[77]  
            </td>
            <td>$user[78]  
            </td>
            <td>$user[79]
            </td>
            <td>$user[80]  
            </td>
            <td>$user[81] 
            </td>
            <td>$user[82]  
            </td>
            <td>$user[83]  
            </td>
        </tr>


        </table>
        </div>
       
        <div>
        <h2 style="color:#3FAEA8;text-align:center"><b>Languages Known</b></h2>
        <table class="table1" cellspacing="4" cellpadding="8" border="1">
           
            <tr>
                <th>Language
                </th>
                <th>Can Read
                </th>
                <th>Can Write
                </th>
                <th>Can Speak
                </th>
            </tr>
            <tr>
                <td>Hindi
                </td>
                <td>$user[129]
                </td>
                <td>$user[130]
                </td>
                <td>$user[131]
                </td>
            </tr>
            <tr>
                <td>English
                </td>
                <td>$user[132]
                </td>
                <td>$user[133]
                </td>
                <td>$user[134]
                </td>
            </tr>

            
        </table>
       <br><br> 
       <div class="center"><span style="color:#3FAEA8"><h3><b>Other Lanugaes Known:</b></h3></span>$ol</div>

  	</div>
    </div>   
    <hr> 
		<h2 style="color:#3FAEA8;text-align:center"><b>Experience Details</b></h2>
    <div>
     <h2 style="color:#3FAEA8;margin-bottom: 4px" class="left"><b>Key Responsibilities :</b></h2>
     <h3 class="left col s6 offset-s3">$key</h3>
    
    </div>  

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------
$pdf->SetDrawColor(128, 0, 0);

// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'BI', 8, 'true');

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);




$html = <<<EOD

<style>

.table1 {
        color: #003300;
        font-family: helvetica;
        font-size: 8pt;
        border-left: 1px #81C784;
        border-right: 1px  #81C784;
        border-top: 1px  #81C784;
        border-bottom: 1px  #81C784;
    }

td {
        border: 2px solid #3FAEA8;
        background-color: #fff;
        text-align: center;
    }

th {
        border: 2px solid #3FAEA8;
        background-color: #DCEDC8;
    }
</style>

<body>

		
        <div>
        <div>
		<h2 style="color:#3FAEA8;text-align:center"><b>Experience Details  (Starting from current employment)</b></h2>
		</div>
        <br>
         <br>

        <table class="table1" cellspacing="4" cellpadding="4" border="1">

        <tr class="table_head">
        <th>Organization
        </th>
        <th>Designation 
        </th>
        <th>From (mm/yyyy)
        </th>
        <th>To<br>(mm/yyyy) 
            </th>
            
        <th>Payscale
        </th>
        <th>Reason of leaving
        </th>

        <th>Experience (in months)&nbsp; 
        </th>

        <th>Nature of work&nbsp; 
        </th>
        </tr>



        <tr id="fexp1">
            <td>$user[85]
            </td>
            <td>$user[86]
            </td>
            <td>$user[87]
            </td>
            <td>$user[88]
            </td>
            <td>$user[89]
            </td>
            <td>$user[90]
            </td>
            <td>$user[91]
            </td>
            <td>$user[92]
            </td>
        </tr>


        <tr id="fexp2">
            <td>$user[93]
            </td>
            <td>$user[94]
            </td>
            <td>$user[95]
            </td>
            <td>$user[96]
            </td>
            <td>$user[97]
            </td>
            <td>$user[98]
            </td>
            <td>$user[99]
            </td>
            <td>$user[100]
            </td>
        </tr>



        <tr id="fexp3">
            <td>$user[101] 
            </td>
            <td>$user[102]
            </td>
            <td>$user[103]
            </td>
            <td>$user[104]
            </td>
            <td>$user[105]
            </td>
            <td>$user[106]
            </td>
            <td>$user[107]
            </td>
            <td>$user[108]
            </td>
        </tr>



        <tr id="fexp4">
            <td>$user[109]
            </td>
            <td>$user[110]
            </td>
            <td>$user[111]
            </td>
            <td>$user[112]
            </td>
            <td>$user[113]
            </td>
            <td>$user[114]
            </td>
            <td>$user[115]
            </td>
            <td>$user[116]
            </td>
        </tr>
    
    <tr id="fexp5">
            <td>$user[117]
            </td>
            <td>$user[118]
            </td>
            <td>$user[119]
            </td>
            <td>$user[120]
            </td>
            <td>$user[121]
            </td>
            <td>$user[122]
            </td>
            <td>$user[123]
            </td>
            <td>$user[124]
            </td>
        </tr>
    

        </table>



    </div>     

    <hr>

      <h2 style="color:#3FAEA8;margin-bottom: 4px" class="left"><b>Statement of Purpose </b></h2>
     
     <h3 class="left col s6 offset-s3">$st</h3>
     
     <br><br>
     <h2 style="clear:both;color:#3FAEA8;margin-bottom: 4px" class="left"><b>Training Undertaken : </b></h2>
     
     <h3 class="left col s6 offset-s3">$tu</h3>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
 
