<?php
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
 .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
} 
</style>

<h1>Application Form</h1>
<br/>
<br/>
<br/>
<br/>
<br>

<h2>Personal Information</h2>
<img class="center" width="150px" height="100px"  src="uploads/photo/$user[65]" alt="photo">
<img class="center" width="150px" height="50px" src="uploads/sign/$user[66]" alt="photo">

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

EOD;


?>