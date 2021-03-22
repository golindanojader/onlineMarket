<?php 


session_start();

if(!$_SESSION["validate"]) {

	header("location:index");
	
	exit();

}else{
require_once "../../../controllers/productController.php";
require_once "../../../models/productModel.php";
require "PDF_MC_Table.php";



$pdf = new PDF_MC_Table();



//Agregamos la primera pagina al documento
$pdf->AddPage();
//Seteamos el inicio del margen superior en 25 pixeles
$textypos = 5;
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial','B',12);
$pdf->Image('../images/logotipo.jpg',10,7,40);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6, '',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(10);

// DATOS DE LA EMPRESA
$pdf->SetFont('Arial','B',10);    
$pdf->setY(20);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Mercado Online C.A J-558888");
// --------------------------
$pdf->SetFont('Arial','B',8);    
$pdf->setY(25);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Dirección"));
$pdf->SetFont('Arial','',8);    
$pdf->setY(25);$pdf->setX(25);
$pdf->Cell(5,$textypos,"Centro Comercial el Rosal piso 2 pasillo 2 Maracay Edo. Aragua");
// ---------------------------
$pdf->SetFont('Arial','B',8);    
$pdf->setY(28);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Teléfono"));
$pdf->SetFont('Arial','',8);    
$pdf->setY(28);$pdf->setX(25);
$pdf->Cell(5,$textypos,"0243-5883699");
// ----------------------------
$pdf->SetFont('Arial','B',8);    
$pdf->setY(31);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Correo"));
$pdf->SetFont('Arial','',8);    
$pdf->setY(31);$pdf->setX(25);
$pdf->Cell(5,$textypos,"mercadooline@gmail.com");
// ----------------------------


$pdf->SetFont('Arial','',15);    
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Reporte de Productos");
// ----------------------------

$pdf->SetFont('Arial','B',8);    
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Generado el:"));
$pdf->SetFont('Arial','',8);    
$pdf->setY(45);$pdf->setX(30);
$pdf->Cell(5,$textypos,date("d/m/yy"));
// ----------------------------

$pdf->SetFont('Arial','B',8);    
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Generado por:"));
$pdf->SetFont('Arial','',8);    
$pdf->setY(50);$pdf->setX(30);
$pdf->Cell(5,$textypos,$_SESSION["user"]);


$pdf->Ln(10);

//Creamos las celdas para los titulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'Item',1,0, 'C',1);
$pdf->Cell(58,6,'Producto',1,0, 'C',1);
$pdf->Cell(80,6, ''.utf8_decode("Descripción").'', 1,0,'C',1);
$pdf->Cell(15,6, 'Cant', 1,0,'C',1);
$pdf->Cell(20,6, 'Prc Unit. ', 1,0,'C',1);
$pdf->Ln(6);


$productList = new productsController();
$answer = $productList->viewsProductsReportController();

#IMPORTANTE----------------------------
$pdf->SetWidths(array(10,	58,80,15,20));

foreach ($answer as $row =>$item) {
$row = $row+1;
$producto = $item["title"];
$descripcion = $item["description"];
$precio = $item["price"];
$cantidad = $item["cant"];

		$pdf->SetFont('Helvetica','',8);
	 	$pdf->Row(array($row, utf8_decode($producto),utf8_decode($descripcion),$cantidad,number_format($precio, 0, ",", ".")."  Bs"));
    

}





$pdf->Output();

}

 ?>