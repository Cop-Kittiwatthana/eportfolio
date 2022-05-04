<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>
<?php
	require('fpdf.php');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',16);
	$pdf->Cell(0,10,'Welcome to www.ThaiCreate.Com',0,1);
	$pdf->Cell(0,20,'Version 2009',0,1,"C");
	$pdf->Output("MyPDF/MyPDF.pdf","F");
?>
	PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>