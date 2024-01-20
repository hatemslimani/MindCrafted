@extends('layouts.navbar')
    @section('content')
    <div id="example1"></div>
    <script src="assets/cours/pdfobject.js"></script>
    <script>PDFObject.embed("assets/cours/pdf/sample-3pp.pdf", "#example1");</script>


<style>
.pdfobject-container {
   width: 600px;
   height: 500px;
}


  /*Stuff neccesary to make PDF viewer work*/
/*
.page {
  background-color: white;
  box-shadow: 0 1px 2px 3px #A6A6A6;
  height: 1054px;
  box-sizing: border-box;
  padding: 1px 0;
  margin: 5px 0 12px;
  page-break-after: always;
  page-break-inside:avoid;
  position: relative;
}
@media print {
  .page {
    box-shadow: none;
    margin: 0;
  }
  html{
    background-color: white !important;
  }
}



.pdf{
    font-family: 'Open Sans', sans-serif;
}

header{
  color: #000044;
  font: bold 30px 'Open Sans', sans-serif;
  
}
.banner{
  background-color: #DDDDDD;
  color: black;
  width: 90%;
  margin: 20px 0 50px;
  padding: 16px 0;
}
.banner h2{
  padding-left: 110px;
  margin: 0;
  font-size: 23px;
}

.blueStripe{
  width: 20px;
  height: 600px;
  background-color: #c3ccf2;
  margin-left: 110px;
}

.infoDiv {
  color: #3D3D3D;
  font-size: 18px;
}


.page_footer {
  text-align: center;
  position: absolute;
  color: #424242;
  bottom: 0;
  left: 0;
  width: 815px;
  padding: 45px 0;
  font-size: 11px;
}
.page_header, .page_header p{
  text-align: right;
  color: #747474;
  margin-top: 10px;
  font-size: 14px;
}*/
</style>
    @endsection