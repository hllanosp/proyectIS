<?php
    $diccionario = array(
        'subtitle'=>array(VIEW_SET_USER=>'Crear un nuevo usuario',
                        VIEW_GET_USER=>'Buscar usuario',
                        VIEW_DELETE_USER=>'Eliminar un usuario',
                        VIEW_EDIT_USER=>'Modificar usuario'
                    ),
        'links_menu'=>array(
            'VIEW_SET_USER'=>MODULE.VIEW_SET_USER.'/',
            'VIEW_GET_USER'=>MODULE.VIEW_GET_USER.'/',
            'VIEW_EDIT_USER'=>MODULE.VIEW_EDIT_USER.'/',
            'VIEW_DELETE_USER'=>MODULE.VIEW_DELETE_USER.'/'
        ),
        'form_actions'=>array(
            'SET'=>'../'.MODULE.SET_USER.'/',
            'GET'=>'../'.MODULE.'controller.php',
            'DELETE'=>'../'.MODULE.DELETE_USER.'/',
            'EDIT'=>'../'.MODULE.EDIT_USER.'/'
        )
    );
    
    function get_template($form='get') {
        $file = '../site_media/html/usuario_'.$form.'.html';
        $template = file_get_contents($file);
        
        return $template;
    }

    function render_dinamic_data($html, $data) {
        foreach ($data as $clave=>$valor) {
            $html = str_replace('{'.$clave.'}', $valor, $html);
        }
        
        return $html;
    }
    
    function retornar_vista($vista, $data=array()) {
        global $diccionario;
        
        $html = get_template('template');
        $html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista],
                            $html);
        $html = str_replace('{formulario}', get_template($vista), $html);
        $html = render_dinamic_data($html, $diccionario['form_actions']);
        $html = render_dinamic_data($html, $diccionario['links_menu']);
        $html = render_dinamic_data($html, $data);
        
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