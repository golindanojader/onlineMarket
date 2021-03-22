
<!-- HACER UN  MODAL DE SALIR -->


<?php

#Borra los productos del carrito de compras
#NOTA; LA INFORMACION DE LOS PRODUCTOS EN EL CARRITO DE COMPRAS SE DEBERIAN ALMACENAR EN UNA ARRAY Y SER MOSTRADOS
#EN TIEMPO DE EJECUCIÓN DEL PROGRAMA Y NO EN BD, PARA QUE LA MISMA OPERE MEJOR
$deleteProductsInPurchaseCar = new exitController();
$deleteProductsInPurchaseCar->deleteProductsInPurchaseCarController();

session_destroy();
header("location:../index");
