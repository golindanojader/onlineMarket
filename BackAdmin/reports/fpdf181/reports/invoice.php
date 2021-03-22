<?php
session_start();

if(!$_SESSION["validate"]) {

    header("location:index");
    
    exit();

}else{

require_once "../../../controllers/purchaseOrderController.php";
require_once "../../../models/purchaseOrderModel.php";
/// Powered by Evilnapsis go to http://evilnapsis.com


require "PDF_MC_Table.php";
$pdf = new PDF_MC_Table();
//Agregamos la primera pagina al documento
$pdf->AddPage();

$textypos = 5;

$clientePurshace = new purchaseOrderController();
$answerClient = $clientePurshace->printBillReportHeaderController();


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

// NUMERO DE PEDIDO
$pdf->SetFont('Arial','B',10);    
$pdf->setY(10);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("PEDIDO # ".$answerClient["idorder"]." "));

// FECHA DE PEDIDO
$pdf->SetFont('Arial','B',10);    
$pdf->setY(15);$pdf->setX(145);
$pdf->Cell(5,$textypos, $newDate = date("d/m/yy", strtotime($answerClient["date"])));

$pdf->SetWidths(array(21,24,27));
// DATOS DEL CLIENTE
$pdf->SetFont('Arial','B',8);    
$pdf->setY(21);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Cliente: " ));
$pdf->SetFont('Arial','',8);    
$pdf->setY(21);$pdf->setX(157);
$pdf->Cell(5,$textypos, $answerClient["name"]." ".$answerClient["lastname"]);


$pdf->SetFont('Arial','B',8);    
$pdf->setY(24);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Docu.: " ));
$pdf->SetFont('Arial','',8);    
$pdf->setY(24);$pdf->setX(157);
$pdf->Cell(5,$textypos, $answerClient["identification"]);

$pdf->SetFont('Arial','B',8);    
$pdf->setY(27);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Telf.: " ));
$pdf->SetFont('Arial','',8);    
$pdf->setY(27);$pdf->setX(157);
$pdf->Cell(5,$textypos, $answerClient["phone"]);

$pdf->SetFont('Arial','B',8);    
$pdf->setY(30);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Dirección.: " ));
$pdf->SetFont('Arial','',8);    

$pdf->setY(30);$pdf->setX(160);

$lenght = array($answerClient["address"]);
$part1 = substr($answerClient["address"], 0,31);
$part2 = substr($answerClient["address"], 32,40);
	



$pdf->Cell(5,$textypos,$part1) ;

$pdf->setY(33);$pdf->setX(145);
$pdf->Cell(5,$textypos,$part2) ;


$pdf->SetFont('Arial','B',15);    
$pdf->setY(50);$pdf->setX(90);
$pdf->Cell(5,$textypos,utf8_decode("Factura Digital"));




$pdf->Ln(20);

//Creamos las celdas para los titulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->setY(60);$pdf->setX(25);
$pdf->SetFillColor(272,272,272);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,0,'Cod',0,0, 'L',1);
$pdf->Cell(90,0,'Producto',0,0, 'L',1);
$pdf->Cell(15,0, 'Cant', 0,0,'L',1);
$pdf->Cell(20,0, 'Prc Unit', 0,0,'L',1);
$pdf->Cell(20,0, 'Total', 0,0,'L',1);
$pdf->Ln(4);


$productList = new purchaseOrderController();
$answer = $productList->printBillReportController($_GET["id"]);

#IMPORTANTE----------------------------
#ESPACIOS DE LA CABECERA DE LA FACTURA
#-------------------------------------------
$pdf->SetWidths(array(15,80,10,30,30));

#NOTA: ESTAS VARIABLES PERMITEN SACAR EL SUBTOTAL YA QUE EL MONTO DE LA BD YA CALCULA EL IVA
$cantPrc=0;
$subTotal=0;
foreach ($answer as $row =>$item) {

$id = "00"."". $item["idproduct"];
$producto = $item["title"];
$cantidad  = $item["cant"];

$precio 	   = number_format($item["price"], 0, ",", ".")."  Bs";
$total 		   =  number_format($item["cant"]  *  $item["price"], 0, ",", ".")."  Bs";

$pdf->SetFont('Arial','',8);
$pdf->Cell(15,0,'',0,0, 'L',1);
$pdf->Row(array($id,$producto,$cantidad,$precio,$total));
$pdf->Ln(0);

#NOTA: ESTAS VARIABLES PERMITEN SACAR EL SUBTOTAL YA QUE EL MONTO DE LA BD YA CALCULA EL IVA
$cantPrc = $item["cant"] * $item["price"];
$subTotal = $subTotal + $cantPrc;

}
#El impuesto de envío es el valor sobrante entre iva menos monto total
#NOTA; ESTAS VARIABLES PERMITEN SACAR EL IMPUESTO DE ENVÍO
$iva = $subTotal * 12 / 100; 	 // Cálculo del IVA
$ivaSubt =  $iva + $subTotal; // IVA total
$impuestoEnvio =  $answerClient["mount"]-$ivaSubt;




$fomula1 = 12 + $row;
$formula2 = $fomula1 * 6;
$formula3 = $formula2 - $row;

$pdf->SetFont('Arial','',9);    
$pdf->setY($formula3);$pdf->setX(145);
$pdf->Cell(5,$textypos,"Subtotal:");

$pdf->SetFont('Arial','B',9);    
$pdf->setY($formula3);$pdf->setX(165);
$pdf->Cell(5,$textypos, number_format($subTotal, 0, ",", ".")."   Bs");


$fomula1 = 12 + $row;
$formula2 = $fomula1 * 6;
$formula3 = $formula2 - $row;
$formula4 = $formula3+5;

$pdf->SetFont('Arial','',9);    
$pdf->setY($formula4);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("IVA 12%:"));

$pdf->SetFont('Arial','B',9);    
$pdf->setY($formula4);$pdf->setX(165);
$pdf->Cell(5,$textypos, number_format($iva, 0, ",", ".")."  		 Bs");


$fomula1 = 12 + $row;
$formula2 = $fomula1 * 6;
$formula3 = $formula2 - $row;
$formula4 = $formula3+10;

$pdf->SetFont('Arial','',9);    
$pdf->setY($formula4);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Envío:"));

$pdf->SetFont('Arial','B',9);    
$pdf->setY($formula4);$pdf->setX(165);
$pdf->Cell(5,$textypos,number_format($impuestoEnvio, 0, ",", "."). "   Bs");




$fomula1 = 12 + $row;
$formula2 = $fomula1 * 6;
$formula3 = $formula2 - $row;
$formula4 = $formula3+5;
$formula5 = $formula4+10;

$pdf->SetFont('Arial','',9);    
$pdf->setY($formula5);$pdf->setX(145);
$pdf->Cell(5,$textypos,utf8_decode("Total: "));

$pdf->SetFont('Arial','B',9);    
$pdf->setY($formula5);$pdf->setX(165);
$pdf->Cell(5,$textypos, number_format($subTotal+$iva+$impuestoEnvio, 0, ",", "." )."  Bs");


$pdf->Output();

}



 ?>