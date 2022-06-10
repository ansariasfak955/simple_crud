<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.wrap { max-width: 980px; margin: 10px auto 0; }
#steps { margin: 80px 0 0 0 }
.commands { overflow: hidden; margin-top: 30px; }
.prev {float:left}
.next, .submit {float:right}
.error { color: #b33; }
#progress { position: relative; height: 5px; background-color: #eee; margin-bottom: 20px; }
#progress-complete { border: 0; position: absolute; height: 5px; min-width: 10px; background-color: #337ab7; transition: width .2s ease-in-out; }


button#step0Next {
/* position: relative; */
margin-top: 2%;
}
.btn-primary {
color: #fff;
background-color: #198754;
border-color: #198754 ;
}
.btn-primary:hover {
color: #fff;
background-color: rgb(245 143 98) ;
border-color: rgb(245 143 98) ;
}
.col-md-2.col-sm-2.col-12.rv-photo-box {
border: 1px solid #ccc;
padding: 50px 17px;
cursor: pointer;
width: 15%;
height: 189px;
padding-left: 6%;
position: relative;
left: 2%;
margin-top: 6%;
}
h2.rv-top-heading {
font-size: 21px!important;
font-style: oblique;
text-align: center;
}
.rv-lag-input {
position: relative;
width: 146%;
left: 16%;
top: 1%;
}
.inpute-left-box {
position: relative;
right: 28%;
top: 22%;
}
.vr-Sing {
position: relative;
top: 17px;
right: 29%;
}
button#step3Prev {
color: #fff;
background-color:#198754;
border-color:#198754;
}
button#step4Prev {
color: #fff;
background-color: #198754;
border-color: #198754;
}
.rv-input-guardian {
position: relative;
width: 97%;
}
.rv-input-mobile {
position: relative;
width: 97%;
left: 2%;
}
.rv-mobile {
position: relative;
left: 2%;
}
.rv-input-hear {
position: relative;
width: 65%;
top: 5px;
}
.vr-hear {
position: relative;
top: 4px;
}
.rv-input-sizes {
position: relative;
right: 32%;
width: 132%;
}
.vr-sizes {
position: relative;
right: 32%;
top: 5px;
}
.rv-input-Sing {
position: relative;
top: 13px;
right: 29%;
width: 129%;
}
.rv-input-deciare {
position: relative;
top: 16px;
width: 66%;
left: 2%;
}
button#step5Prev {
color: #fff;
background-color: #198754;
border-color:#198754;
}
.vr-deciare {
position: relative;
top: 16px;
left: 2%;
}
button#step2Prev {
color: #fff;
background-color: #198754;
border-color: #198754;
}
.rv-form-size label {
margin: 0px;
}
.rv-input-second-dista {
position: relative;
left: 5%;
width: 95%;
top: 54%;
}
.rv-nick-name {
position: relative;
left: 6%;
top: 51%;
}
.rv-input-gap {
position: relative;
left: 5%;
width: 98%;
top: 28%;
}
.vr-name {
position: relative;
left: 7%;
top: 29%;
}
span.rv-sr-no {
position: relative;
float: right;
left: 113%;
}
span.rv-heading-inforamation {
font-size: 17px;
position: relative;
left: 7%;
}
.rv-inpute-father {
position: relative;
width: 197%;
left: 11%;
top: 15%;
}
.rv-father-name {
position: relative;
left: 14%;
top: 9%;
}
.rv-input-blood-group {
position: relative;
width: 94%;
left: 7%;
top: 1%;
}
.vr-blood-group {
position: relative;
left: 8%;
}
.vr-brith-date {
position: relative;
left: 7%;
top: 12%;
}
.rv-input-brith {
position: relative;
width: 95%;
left: 6%;
top: 16%;
}
.vr-Contact-Number {
position: relative;
left: 8%;
}
.rv-input-Contact {
position: relative;
width: 94%;
left: 7%;
top: 1%;
}
.vr-e-mail {
position: relative;
left: 7%;
}
.rv-email-input {
position: relative;
width: 99%;
left: 6%;
top: 0%;
}
.down {
transform: rotate(45deg);
-webkit-transform: rotate(45deg);
}
.rv-relation {
position: relative;
left: 62%;
top: 15%;
}
.rv-input-relation {
position: relative;
left: 61%;
width: 106%;
top: 14%;
}
.vr-nominee {
position: relative;
left: 8%;
top: 19%;
}
.rv-input-nominee {
position: relative;
left: 7%;
top: 15%;
width: 150%;
}
.vr-residence {
position: relative;
left: 1%;
top: 12%;
}
.rv-input-residence {
position: relative;
left: 1%;
top: 23%;
width: 99%;
}
.card.mt-5 {
border-top: 9px solid #00962e;
}
.vr-.permanent-address {
position: relative;
left: 1%;
top: 8%;
}
.rv-input-Permanent {
position: relative;
left: 1%;
top: 15%;
width: 99%;
}
.vr-Correspondence {
position: relative;
left: 1%;
top: 0%;
}
.rv-input-Correspondence {
position: relative;
left: 1%;
top: 11%;
width: 99%;
}
.vr-other-Address {
position: relative;
left: 1%;
top: 0%;
}
.rv-input-other-Address {
position: relative;
left: 1%;
top: 13%;
width: 99%;
}
.vr-transportation {
position: relative;
left: 1%;
top: 0%;
}
.rv-input-transportation {
position: relative;
left: 1%;
top: 6%;
width: 99%;
}
.vr-occupation {
position: relative;
left: 69%;
top: 16%;
}
.rv-input-occupation {
position: relative;
left: 69%;
top: 16%;
width: 92%;
}
.rv-salary {
position: relative;
left: 6%;
top: 14%;
}
legend.rv-heading-age {
position: relative;
top: 5px;
}
.rv-input-salary {
position: relative;
left: 5%;
width: 100%;
top: 17%;
}
.vr-academics {
position: relative;
left: 3%;
top: 26%;
}
.rv-input-academics {
position: relative;
left: 2%;
top: 29%;
width: 100%;
}
.rv-professianal {
position: relative;
left: 5%;
top: 25%;
}
.rv-input-professianal {
position: relative;
left: 5%;
width: 95%;
top: 28%;
}
.vr-diploma {
position: relative;
left: 3%;
top: 27%;
}
.rv-input-diploma {
position: relative;
left: 2%;
top: 27%;
width: 100%;
}
.rv-experience {
position: relative;
left: 6%;
top: 30%;
}
button#step1Prev {
color: #fff;
background-color: #198754;
border-color:#198754;
}
.rv-input-experience {
position: relative;
left: 5%;
width: 95%;
top: 29%;
}
span.rv-heading-qualification {
font-size: 17px;
position: relative;
left: 1%;
}
span.rv-heading-family-details {
font-size: 17px;
position: relative;
left: 1%;
}
.rv-input-mother-name {
position: relative;
left: 8px;
top: 9%;
width: 99%;
}
.vr-mother-name {
position: relative;
left: 1%;
}
span.rv-heading-age {
position: relative;
left: 1%;
}
.rv-Signature-upload {
position: relative;
left: 18%;
top: 10px;
border: 2px solid #eeeeee;
width: 80%;
text-align: center;
padding: 10px;
}
.inpute-sing {
position: relative;
left: 29%;
font-size: 8px;
}
.vr-spouse-name {
position: relative;
left: 1%;
}
.rv-input-spouse-name {
position: relative;
left: 8px;
top: 9%;
width: 99%;
}
.vr-second-name {
position: relative;
left: 3%;
top: 28%;
}
.rv-input-second-name {
position: relative;
left: 2%;
top: 29%;
width: 100%;
}
.vr-lag {
position: relative;
left: 67%;
top: 8%;
}
.rv-lag-input {
position: relative;
width: 94%;
left: 67%;
top: 14%;
}
rv-aadhar-input {
position: relative;
top: 10%;
width: 145%;
left: 8%;
}
.vr-pan-Number {
position: relative;
left: 163px;
top: 4px;
}
.vr-aadhar {
position: relative;
top: 0%;
left: 6%;
}

.rv-aadhar-input {
position: relative;
left: 5%;
top: 0%;
width: 100%;
}
.rv-input-pan {
position: relative;
left: 60%;
width: 106%;
top: 6Px;
}
.rv-inputmarital-status {
position: relative;
left: 7%;
width: 150%;
top: 6px;
}
.vr-marital-status {
position: relative;
left: 8%;
top: 4px;
}
.vr-salary {
position: relative;
top: 8px;
left: 5%;
}
.rv-residence {
position: relative;
left: 8%;
top: 7px;
}
.rv-input-residence {
position: relative;
left: 8%;
top: 18%;
width: 133%;
}
.rv-correspondence {
position: relative;
left: 9%;
}
.rv-input-correspondence {
position: relative;
left: 9%;
width: 132%;
}
.vr-permanent-address {
position: relative;
left: 5%;
}
.rv-input-permanent-address {
position: relative;
left: 5%;
}

.rv-transportation {
position: relative;
left: 10%;
top: -16%;
}
.rv-input-transportation {
position: relative;
left: 9%;
top: 0%;
width: 133%;
}
.vr-other-address {
position: relative;
top: -13%;
left: 5%;
}
.rv-input-other-address {
position: relative;
left: 4%;
width: 101%;
}

@media (max-width: 768px) {
@media (max-width: 768px)
.container.mt-5.p-3 {
margin: 0px;
}
.col-md-2.col-sm-2.col-12.rv-photo-box {
border: 1px solid #ccc;
padding: 50px 17px;
cursor: pointer;
width: 48%;
height: 113px;
padding-left: 6%;
position: relative;
left: 29%;
margin-top: 6%;
}
.inpute-left-box {
position: relative;
right: 1%;
top: 22%;
}
.rv-input-transportation {
position: relative;
left: 3%;
top: 21%;
width: 98%;
}
.rv-transportation {
position: relative;
left: 2%;
top: 19%;
font-size: 9px;
}
.rv-input-other-address {
position: relative;
left: 3%;
top: 5px;
width: 98%;
}
.vr-other-address {
position: relative;
top: 2px;
left: 4%;
}
.rv-input-correspondence {
position: relative;
left: 3%;
width: 97%;
top: 14px;
}
.rv-correspondence {
position: relative;
left: 4%;
top: 13px;
}
.rv-input-permanent-address {
position: relative;
left: 3%;
top: 10px;
width: 96%;
}

.vr-permanent-address {
position: relative;
left: 3%;
top: 10px;
}
.rv-input-residence {
position: relative;
left: 3%;
top: 36%;
width: 96%;
}
.rv-residence {
position: relative;
left: 3%;
top: 11px;
}
.rv-input-salary {
position: relative;
left: 3%;
width: 95%;
top: 17%;
}
.rv-input-occupation {
position: relative;
left: 3%;
top: 16%;
width: 95%;
}
.vr-occupation {
position: relative;
left: 4%;
top: 13%;
}
.rv-input-relation {
position: relative;
left: 3%;
width: 95%;
top: 12%;
}
.rv-relation {
position: relative;
left: 4%;
top: 11%;
}
.rv-input-nominee {
position: relative;
left: 3%;
top: 11%;
width: 94%;
}
.vr-nominee {
position: relative;
left: 4%;
top: 9%;
}
.rv-lag-input {
position: relative;
width: 94%;
left: 3%;
top: 10%;
}
.vr-lag {
position: relative;
left: 3%;
top: 5%;
}
.rv-input-pan {
position: relative;
left: 3%;
width: 95%;
top: 3Px;
}
.vr-pan-Number {
position: relative;
left: 12px;
top: 2px;
}
.rv-inputmarital-status {
position: relative;
left: 2%;
width: 97%;
top: 2px;
}
.vr-marital-status {
position: relative;
left: 2%;
top: 2px;
}
.rv-input-Contact {
position: relative;
width: 97%;
left: 2%;
top: 1%;
}
.vr-Contact-Number {
position: relative;
left: 2%;
}
.rv-aadhar-input {
position: relative;
left: 2%;
top: 0%;
width: 97%;
}
.vr-aadhar {
position: relative;
top: 0%;
left: 3%;
}
.rv-input-blood-group {
position: relative;
width: 96%;
left: 3%;
top: 1%;
}
.vr-blood-group {
position: relative;
left: 4%;
}
.rv-email-input {
position: relative;
width: 96%;
left: 3%;
top: 0%;
}
.vr-e-mail {
position: relative;
left: 4%;
}
.rv-input-brith {
position: relative;
width: 96%;
left: 3%;
top: 24%;
}
.vr-brith-date {
position: relative;
left: 3%;
top: 20%;
}
.rv-inpute-father {
position: relative;
width: 96%;
left: 3%;
top: 20%;
}
.rv-father-name {
position: relative;
left: 3%;
top: 18%;
}
.rv-input-second-dista {
position: relative;
left: 3%;
width: 96%;
top: 50%;
}
.rv-nick-name {
position: relative;
left: 4%;
top: 48%;
}
.rv-input-gap {
position: relative;
left: 3%;
width: 96%;
top: 41%;
}
.vr-name {
position: relative;
left: 4%;
top: 37%;
}
span.rv-heading-inforamation {
font-size: 17px;
position: relative;
left: 2%;
}
.rv-input-experience {
position: relative;
left: 2%;
width: 99%;
top: 34%;
}
.rv-experience {
position: relative;
left: 2%;
top: 30%;
}
.rv-input-professianal {
position: relative;
left: 2%;
width: 99%;
top: 28%;
}
.rv-professianal {
position: relative;
left: 2%;
top: 25%;
}
.rv-input-spouse-name {
position: relative;
left: 8px;
top: 11%;
width: 99%;
}
.vr-spouse-name {
position: relative;
left: 3%;
top: 5px;
}
.rv-input-diploma {
position: relative;
left: 2%;
top: 27%;
width: 99%;
}
.rv-input-guardian {
position: relative;
width: 93%;
left: 3%;
}
.vr-guardian {
position: relative;
left: 3%;
}
.rv-input-ref {
position: relative;
left: 3%;
width: 93%;
}
.rv-ref {
position: relative;
left: 3%;
}
.rv-input-mobile {
position: relative;
width: 93%;
left: 3%;
}
.rv-mobile {
position: relative;
left: 3%;
}
.rv-input-hear {
position: relative;
width: 91%;
top: 5px;
left: 5%;
}
.vr-hear {
position: relative;
top: 4px;
left: 4%;
}
.rv-input-sizes {
position: relative;
/* right: 32%; */
width: 90%;
left: 6%;
}
.vr-sizes {
position: relative;
/* right: 32%; */
top: 4px;
left: 6%;
}
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script src="../jquery.formtowizard.js"></script>

<script>
$( function() {
var $signupForm = $( '#SignupForm' );

$signupForm.validate({errorElement: 'em'});

$signupForm.formToWizard({
submitButton: 'SaveAccount',
nextBtnClass: 'btn btn-primary next',
prevBtnClass: 'btn btn-default prev',
buttonTag: 'button',
validateBeforeNext: function(form, step) {
var stepIsValid = true;
var validator = form.validate();
$(':input', step).each( function(index) {
var xy = validator.element(this);
stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
});
return stepIsValid;
},
progress: function (i, count) {
$('#progress-complete').width(''+(i/count*100)+'%');
}
});
});
</script>

</head>

<body>

<div class="container mt-5 p-3">
<div class="row">
<div class="col-12">
<div class="card shadow border-top border-start-0 border-end-0 border-bottom-0 border-5 border-success">
<div class="card-body">
<h1 style="margin:10px auto 10px auto;" class="text-center">REGISTRATION FORM</h1>
<div class="row wrap"><div class="col-lg-12">

<div id='progress'><div id='progress-complete'></div></div>

<form id="SignupForm" action="">
<fieldset>
<legend>Account information</legend>
<div class="row g-0">
<div class="col-md-10 col-sm-10 col-12">
<div class="row g-0 align-self-center mb-4">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<h5><span class="rv-heading-inforamation">Personal Information</span> <span class="rv-sr-no"> Sr.No.</span></h5>
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-name">
<label for="name">Name:</label>
</div>

<div class="rv-input-gap">
<input type="text" id="name" class="form-control" placeholder="Enter yourname" required / >
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-nick-name">
<label for="nickname">Nick-name</label>
</div>
<div class="rv-input-second-dista">
<input type="text" id="nickname" class="form-control" placeholder="Enter your nickname" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center mb-4">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-md-6 col-sm-6 col-12 rv-form-size">
<div class="rv-father-name">
    <label for="fname">Father's/Husband's Name</label>
</div>
<div class="rv-inpute-father">
    <input type="text" id="fname" class="form-control" placeholder="Father's/Husband's Name" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-brith-date">
<label for="dob">Date of Birth</label>
</div>

<div class="rv-input-brith">
<input type="date" id="dob" class="form-control" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-e-mail">
<label for="email">E-mail</label>
</div>

<div class="rv-email-input">
<input type="email" id="email" class="form-control" placeholder="Enter your email" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-blood-group">
<label for="bldgrp">Blood Group</label>
</div>

<div class="rv-input-blood-group">
<input type="text" id="bldgrp" class="form-control" placeholder="Blood Group" required / >
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-aadhar">
<label for="aadhar">Aadhar Number</label>
</div>

<div class="rv-aadhar-input">
<input type="number" id="aadhar" class="form-control" placeholder="Enter your aadhar number" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-Contact-Number">
<label for="contact">Contact Number</label>
</div>

<div class="rv-input-Contact">
<input type="number" id="contact" class="form-control" placeholder="Mobile Number" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-marital-status">
<label for="marital-status">Marital Status
</label>
</div>

<div class="rv-inputmarital-status">
<input type="text" id="marital-status" class="form-control" placeholder="Enter Marital-Status" required />
</div>
</div>

</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-pan-Number">
<label for="pan">PAN Number</label>
</div>

<div class="rv-input-pan">
<input type="text" id="pan" class="form-control" placeholder="Enter PAN Number" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-lag">
<label for="Language">Language Known</label>
</div>

<div class="rv-lag-input">
<select class="form-control">

<option value="">Hindi</option>
<option value="">Englishi</option>

</select>
</div>
</div>
</div>

</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-nominee">
<label for="nominee">Nominee:</label>
</div>

<div class="rv-input-nominee">
<input type="text" id="nominee" class="form-control" placeholder="Enter Your Nominee" required />
</div>
</div>

</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-relation">
<label for="relation">Relation</label>
</div>
<div class="rv-input-relation">
<input type="text" id="relation" class="form-control" placeholder="Enter your Relation" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-occupation">
<label for="occupation">Occupation:</label>
</div>

<div class="rv-input-occupation">
<input type="text" id="occupation" class="form-control" placeholder="Enter Your Occupation" required />
</div>
</div>
</div>

</div>
</div>
<div class="row g-0 align-self-center mb-4">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-salary">
<label for="salary">Salary:</label>
</div>

<div class="rv-input-salary">
<input type="text" id="name" class="form-control" placeholder="Enter your salary" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-residence">
<label for="residence"> Type Of Residence:<span style="font-size:10px;">(Paerntal/ Owned/Rented/Temporary(Jhopdi)</span></label>
</div>
<div class="rv-input-residence">
<input type="text" id="residence" class="form-control" placeholder="Enter your residence" required / >
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center mb-4">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-permanent-address">
<label for="permanent-address">Permanent Address:</label>
</div>

<div class="rv-input-permanent-address">
<input type="text" id="permanent-address" class="form-control" placeholder="Enter your permanent-address" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-correspondence">
<label for="correspondence"> Correspondence</label>
</div>
<div class="rv-input-correspondence">
<input type="text" id="correspondence" class="form-control" placeholder="Enter your correspondence" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center mb-4">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-other-address">
<label for="other-address:">Other Address:</label>
</div>

<div class="rv-input-other-address">
<input type="text" id="other-address" class="form-control" placeholder="Enter yourother-address" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-transportation">
<label for="transportation"> Transportation <span style="font-size:10px;">(Bike/ Car/Bus/Auto/E-Rikshaw</span> Personal Vehicle( if any)</label>
</div>
<div class="rv-input-transportation">
<input type="text" id="transportation" class="form-control" placeholder="Enter your transportation" required />
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-2 col-sm-2 col-12 rv-photo-box">
<div class="vr-box-poston">
<label for="pic">Photo</label>
<div class="inpute-left-box">
<input type="file" id="pic" class="form-control">
</div>
</div>

</div>
</div>
</fieldset>

<fieldset>
<legend>Qualification</legend>
<div class="form-group">
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-academics">
<label for="academics">Last-Academics:</label>
</div>

<div class="rv-input-academics">
<input type="text" id="academics" class="form-control" placeholder="Enter Your last-academics" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-professianal">
<label for="professianal">Professianal(if any)</label>
</div>
<div class="rv-input-professianal">
<input type="text" id="professianal" class="form-control" placeholder="Enter your professianal" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-diploma">
<label for="diploma">Diploma(if any):</label>
</div>

<div class="rv-input-diploma">
<input type="text" id="diploma" class="form-control" placeholder="Enter Your diploma" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="experience">Experience (if any)</label>
</div>
<div class="rv-input-experience">
<input type="text" id="experience" class="form-control" placeholder="Enter your experience" required />
</div>
</div>
</div>
</div>
</div>

</div>
</fieldset>
<fieldset>
<legend>Family Details</legend>
<div class="form-group">
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-mother-name">
<label for="mother-name">Mother's Name:</label>
</div>

<div class="rv-input-mother-name">
<input type="text" id="mother-name" class="form-control" placeholder="Enter Your mother-name" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-spouse-name">
<label for="spouse-name">Spouse Name:</label>
</div>

<div class="rv-input-spouse-name">
<input type="text" id="spouse-name" class="form-control" placeholder="Enter Your spouse-name" required />
</div>
</div>
</div>
</div>
</div>
<legend class="rv-heading-age">Name of Dependents & Age</legend>
<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-second-name">
<label for="name">Name:</label>
</div>

<div class="rv-input-second-name">
<input type="text" id="name" class="form-control" placeholder="Enter Your name" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="age">Age</label>
</div>
<div class="rv-input-experience">
<input type="text" id="age" class="form-control" placeholder="Enter your age" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="relation">Relation</label>
</div>
<div class="rv-input-experience">
<input type="text" id="relation" class="form-control" placeholder="Enter your relation" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-second-name">
<label for="name">Name:</label>
</div>

<div class="rv-input-second-name">
<input type="text" id="name" class="form-control" placeholder="Enter Your name" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="age">Age</label>
</div>
<div class="rv-input-experience">
<input type="text" id="age" class="form-control" placeholder="Enter your age" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="relation">Relation</label>
</div>
<div class="rv-input-experience">
<input type="text" id="relation" class="form-control" placeholder="Enter your relation" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-second-name">
<label for="name">Name:</label>
</div>

<div class="rv-input-second-name">
<input type="text" id="name" class="form-control" placeholder="Enter Your name" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="age">Age</label>
</div>
<div class="rv-input-experience">
<input type="text" id="age" class="form-control" placeholder="Enter your age" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="relation">Relation</label>
</div>
<div class="rv-input-experience">
<input type="text" id="relation" class="form-control" placeholder="Enter your relation" required />
</div>
</div>
</div>
</div>
</div>
</div>
</fieldset>

<fieldset>
<legend>Other Details</legend>
<div class="form-group">
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-academics">
<label for="nearest-thana">Nearest Thana:</label>
</div>

<div class="rv-input-academics">
<input type="text" id="nearest-thana" class="form-control" placeholder="Enter Your nearest-thean" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-professianal">
<label for="nearest-tahseele">Nearest Tahseele</label>
</div>
<div class="rv-input-professianal">
<input type="text" id="nearest-tahseele" class="form-control" placeholder="Enter your nearest-Tahseele" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-diploma">
<label for="hospital">Nearest Hospital:</label>
</div>

<div class="rv-input-diploma">
<input type="text" id="hospital" class="form-control" placeholder="Enter Your hospital" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="post-office">Nearest Post Office</label>
</div>
<div class="rv-input-experience">
<input type="text" id="post-office" class="form-control" placeholder="Enter your post office" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-diploma">
<label for="bus-stand">Nearest Bus-Stand:</label>
</div>

<div class="rv-input-diploma">
<input type="text" id="bus-stand" class="form-control" placeholder="Enter Your bus-stand" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="railway-station">Nearest Railway Station</label>
</div>
<div class="rv-input-experience">
<input type="text" id="railway-station" class="form-control" placeholder="Enter your railway-station" required />
</div>
</div>
</div>
</div>
</div>


</fieldset>

<fieldset>
<legend>Bank Details</legend>
<div class="form-group">
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-academics">
<label for="bank">Bank Name:</label>
</div>

<div class="rv-input-academics">
<input type="text" id="bank" class="form-control" placeholder="Enter Your bank" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-professianal">
<label for="bank-branch">Bank Branch</label>
</div>
<div class="rv-input-professianal">
<input type="text" id="bank-branch" class="form-control" placeholder="Enter your bank-branch" required />
</div>
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-diploma">
<label for="account">Name as on A/C:</label>
</div>

<div class="rv-input-diploma">
<input type="text" id="account" class="form-control" placeholder="Enter Your account" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-experience">
<label for="afc">AFC</label>
</div>
<div class="rv-input-experience">
<input type="text" id="afc" class="form-control" placeholder="Enter your afc" required />
</div>
</div>
</div>
</div>
</div>

</div>
</fieldset>
<fieldset class="form-horizontal" role="form">
<legend></legend>





<div class="form-group">

<div class="row g-0 align-self-center">
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-guardian">
<label for="guardian">Name of family Guardian:</label>
</div>

<div class="rv-input-guardian">
<input type="text" id="guardian" class="form-control" placeholder="Enter Your Guardian" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-ref">
<label for="ref">Ref/ID</label>
</div>
<div class="rv-input-ref">
<input type="text" id="ref" class="form-control" placeholder="Enter your experience" required />
</div>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="rv-mobile">
<label for="mobile">Mobile No</label>
</div>
<div class="rv-input-mobile">
<input type="text" id="mobile" class="form-control" placeholder="Enter your mobile-no" required />
</div>
</div>
</div>
</div>
<div class="row g-0 align-self-center">
<div class="col-md-6 col-sm-6 col-12 align-self-center">
<div class="row g-0">
<div class="col-12 rv-form-size">
<div class="vr-hear">
<label for="deciare">Hear By Deciare:
</div>

<div class="rv-input-hear">
<input type="text" id="deciare" class="form-control" placeholder="Enter Your Deciare" required />
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6col-12 align-self-center">
<div class="vr-sizes">
<label for="Sing">Sing:
</div>

<div class="rv-input-sizes">
<input type="text" id="Sing" class="form-control" placeholder="Enter Your Deciare" required />
</div>
</div>
</div>




</div>


</fieldset>
<p>
<button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
</p>
</form>

</div></div>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
</body>
</html>

</div>
</div>
</div>
</div>
</div>


