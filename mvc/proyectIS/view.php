<?php
    $diccionario = array(
        'subtitle'=>array(VIEW_SET_USER=>'Crear un nuevo usuario',
                        VIEW_DELETE_USER=>'Eliminar un usuario',
                        VIEW_EDIT_USER=>'Modificar usuario'
                    ),
        'links_menu'=>array(
            'VIEW_SET_USER'=>MODULE.VIEW_SET_USER.'/',
            'VIEW_EDIT_USER'=>MODULE.VIEW_EDIT_USER.'/',
            'VIEW_DELETE_USER'=>MODULE.VIEW_DELETE_USER.'/'
        ),
        'form_actions'=>array(
            'GET'=>'../'.MODULE.'controller.php',
        )
    );
    
    function get_template($form='get') {
        $file = 'mvc/site_media/html/proyectIS_'.$form.'.html';
        $template = file_get_contents($file);
        
        return $template;
    }

    function render_dinamic_data($html, $data, $vista) {
        if (count($data) == 1){
            foreach ($data as $clave=>$valor) {
                $html = str_replace('{'.$clave.'}', $valor, $html);
            }
        }else{
            $length = count($data);
            $i = 0;
            foreach ($data as $row) {
                if (is_array($row) || is_object($row))
                {
                    $i = $i + 1;
                    foreach ($row as $clave => $valor) {
                        $html = str_replace('{'.$clave.'}', $valor, $html);
                    }

                    if ($i != $length){
                        $html = str_replace('{next}', get_template($vista), $html);
                    }else{
                        $html = str_replace('{next}','', $html);
                    }
                }
            }
        }
        return $html;
    }
    
    function retornar_vista($vista, $data=array()) {
        global $diccionario;
        
        $html = get_template('template');
        $html = str_replace('{project}', get_template($vista), $html);
        $html = render_dinamic_data($html, $data, $vista);
        
        // render {mensaje}
        if(array_key_exists('names', $data)&&
            array_key_exists('surNames', $data)&&
            $vista==VIEW_EDIT_USER) {
            $message = 'Editar usuario '.$data['names'].' '.$data['surNames'];
        } else {
            if(array_key_exists('message', $data)) {
                $message = $data['message'];
            } else {
                $message = 'Datos del usuario:';
            }
        }
        $html = str_replace('{message}', $message, $html);
        
        print $html;
    }
?>