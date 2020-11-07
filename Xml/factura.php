<?php  

crear();

function crear(){
    $bd = new mysqli('localhost', 'root', '', 'reportes_db') or die(
        "Error al conectarse con la base de datos");
    $stmt = $bd->prepare("SELECT * FROM vistafactura");
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($pn, $cn,$cdni,$cc,$cco,$pdi,$prn,$prpv,$pec,$pept);
    $xml = new DOMDocument('1.0', 'UTF-8');
    $facturas = $xml->createElement('facturas');
    $facturas = $xml->appendChild($facturas);

    while ($stmt->fetch()) {
        
        $fac = $xml->createElement('factura');
        $fac = $facturas->appendChild($fac);

        $nodo_pedido = $xml->createElement('PED_NUMERO',$pn);
        $nodo_pedido = $fac->appendChild($nodo_pedido);

        $nodo_nombre = $xml->createElement('CLI_NOMBRES',$cn);
        $nodo_nombre = $fac->appendChild($nodo_nombre);

        $nodo_dni = $xml->createElement('CLI_DNI',$cdni);
        $nodo_dni = $fac->appendChild($nodo_dni);

        $nodo_celular = $xml->createElement('CLI_CELULAR',$cc);
        $nodo_celular = $fac->appendChild($nodo_celular);

        $nodo_correo = $xml->createElement('CLI_CORREO',$cco);
        $nodo_correo = $fac->appendChild($nodo_correo);

        $nodo_dir = $xml->createElement('PED_DIRECCION',$pdi);
        $nodo_dir = $fac->appendChild($nodo_dir);

        $nodo_pnombre = $xml->createElement('PRO_NOMBRE',$prn);
        $nodo_pnombre = $fac->appendChild($nodo_pnombre);

        $nodo_pventa = $xml->createElement('PRO_PRECIO_VENTA',$prpv);
        $nodo_pventa = $fac->appendChild($nodo_pventa);

        $nodo_pcantidad = $xml->createElement('DEP_CANTIDAD',$pec);
        $nodo_pcantidad = $fac->appendChild($nodo_pcantidad);

        $nodo_ptotal = $xml->createElement('DEP_PRECIOTOTAL',$pept);
        $nodo_ptotal = $fac->appendChild($nodo_ptotal);
    }

    $bd->close();
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('factura.xml');

   // echo "<p><b>El xm ha sido creado ... Mosrando en el texto plano: </b></p>".
    //htmlentities($el_xml)."<hr>";
    echo "<script> alert ('Archivo genereado en la carpeta Xml' );location.href='../Xml/factura.xml'</script>";

}
