<?php
    $name_file = $_POST['txtArchivo'];
	date_default_timezone_set('America/Mexico_City');
    /* Se agrega la libreria PHPExcel */
    require '../PHPExcel/Classes/PHPExcel.php';
    // Se crea el objeto PHPExcel
    $objPHPExcel = new PHPExcel();
    // Se asignan las propiedades del libro
    $objPHPExcel->getProperties()->setCreator("Bombardier") // Nombre del autor
        ->setLastModifiedBy("Bombardier") //Ultimo usuario que lo modificó
        ->setTitle("Reporte ExceL") // Titulo
        ->setSubject("Reporte Excel") //Asunto
        ->setDescription("Listado TOs") //Descripción
        ->setKeywords("Listado TOs") //Etiquetas
        ->setCategory("Reporte excel"); //Categorias
    // $tituloReporte = "Garantías Centro";
    $titulosColumnas = array('Fecha Creacion TO', 'MRPController', '# TO', 'Work Order', 'Estacion','# Carro', 'Qty Línea en TO', 'Faltantes', 'Entrega', 'Count Open(No Mover)');
    // Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
    // $objPHPExcel->setActiveSheetIndex(0)
    //     ->mergeCells('A1:D1');
    // Se agregan los titulos del reporte
    $objPHPExcel->setActiveSheetIndex(0)
        // ->setCellValue('A1',$tituloReporte) // Titulo del reporte
        ->setCellValue('A1',  $titulosColumnas[0])  //Titulo de las columnas
        ->setCellValue('B1',  $titulosColumnas[1])
        ->setCellValue('C1',  $titulosColumnas[2])
        ->setCellValue('D1',  $titulosColumnas[3])
        ->setCellValue('E1',  $titulosColumnas[4])
        ->setCellValue('F1',  $titulosColumnas[5])
        ->setCellValue('G1',  $titulosColumnas[6])
        ->setCellValue('H1',  $titulosColumnas[7])
        ->setCellValue('I1',  $titulosColumnas[8])
        ->setCellValue('J1',  $titulosColumnas[9]);
    //Se agregan los datos
    $i = 2; //Numero de fila donde se va a comenzar a rellenar
    // $f = 0;
    // while ($f <= 3) {
    //     $objPHPExcel->setActiveSheetIndex(0)
    //         ->setCellValue('A'.$i, 'Fila 1')
    //         ->setCellValue('B'.$i, 'Fila 2')
    //         ->setCellValue('C'.$i, 'Fila 3')
    //         ->setCellValue('D'.$i, 'Fila 4')
    //         ->setCellValue('F'.$i, 'Fila 4')
    //         ->setCellValue('G'.$i, 'Fila 4')
    //         ->setCellValue('H'.$i, 'Fila 4')
    //         ->setCellValue('I'.$i, 'Fila 4')
    //         ->setCellValue('J'.$i, 'Fila 4');
    //         $i++;
    //         $f++;
    // }
    #ESTILO A LA HOJA
    $estiloTituloReporte = array(
            'font' => array(
            'name'      => 'Verdana',
            'bold'      => true,
            'italic'    => false,
            'strike'    => false,
            'size' =>16,
            'color'     => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                'argb' => '969696')
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_NONE
            )
        )
    );
        
    $estiloTituloColumnas = array(
            'font' => array(
            'name'  => 'Arial',
            'bold'  => true,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                    'startcolor' => array(
                        'rgb' => '969696'
                    ),
                    'endcolor' => array(
                        'argb' => '969696'
                    )
                ),
                'borders' => array(
                    'top' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    ),
                    'bottom' => array(
                        'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                        'color' => array(
                            'rgb' => '143860'
                        )
                    )
                ),
                'alignment' =>  array(
                    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'      => TRUE
                )
            );    
            $estiloInformacion = new PHPExcel_Style();
                $estiloInformacion->applyFromArray( array(
                    'font' => array(
                        'name'  => 'Arial',
                        'color' => array(
                            'rgb' => '000000'
                        )
                    ),
                    'fill' => array(
                    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array(
                            'argb' => 'FFd9b7f4')
                    ),
                    'borders' => array(
                        'left' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN ,
                        'color' => array(
                                'rgb' => '3a2a47'
                            )
                        )
                    )
                ));
	// $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A2:J".($i-1));
	for($i = 'A'; $i <= 'J'; $i++){
	    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
	}    
    // Se asigna el nombre a la hoja
    $objPHPExcel->getActiveSheet()->setTitle('TOs');
        
    // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
    $objPHPExcel->setActiveSheetIndex(0);
    // Inmovilizar paneles
    //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
    // $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
    // // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Disposition: attachment;filename="garantias_centro.xlsx"');
    // header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('./' . $name_file . '.xlsx');	
    echo '<script language="javascript">alert("Archivo creado correctamente")</script>';
    echo '<script language="javascript">document.location.href = "../index.php";</script>';					
    exit;

?>