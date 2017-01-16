<?php

$data = $_POST;

// var_dump($_POST); 
// die();


$result = '';
$no = 1;
$template = '';

if($data['action'] != '')
{
    $template .= '<form action="'.$data['action'].'" method="'.$data['method'].'" role="form" class="form-horizontal">';
}

foreach($data['form'] as $key => $value)
{
    if(!$value['form_name'] == '')
    {
        switch($value['form_type'])
        {
            case 'checkbox':
                $checkbox = '';
                $index_arr = 0;
                foreach($value['form_value'] as $key2 => $value2)
                {
                    if($value2['form_value'] != '' && $value['form_display'][$index_arr])
                    {
                        $checkbox .= '                        
                            <div class="checkbox checkbox-replace checkbox-inline">
                                <input id="'.$value['form_name'].'Checkbox-'.$index_arr.'" type="checkbox" name="'.$value['form_name'].'[]" value="'.$value2['form_value'].'">
                                <label for="'.$value['form_name'].'Checkbox-'.$index_arr.'">'.$value['form_display'][$index_arr].'</label>
                            </div>';
                    }

                    $index_arr++;
                }

                $template .= '
                    <div class="form-group">
                        <label>'.$value['form_label'].'</label>
                        <div class="clear-fix">'.$checkbox.'</div>
                    </div>
                ';
                break;
            
            case 'select':
                $select = '';
                $index_arr = 0;
                $select .= '<select name="'.$value['form_name'].'" class="select2 form-control">';
                foreach($value['form_value'] as $key2 => $value2)
                {
                    if($value2['form_value'] != '' && $value['form_display'][$index_arr])
                    {
                        $select .= '   
                            <option value="'. $value2['form_value'] .'">'.$value['form_display'][$index_arr].'</option>               
                            ';
                    }

                    $index_arr++;
                }
                $select .= '</select>';

                $template .= '
                    <div class="form-group">
                        <label>'.$value['form_label'].'</label>
                        '.$select.'
                    </div>
                ';
                break;

            case 'radio':
                $radio = '';
                $index_arr = 0;
                foreach($value['form_value'] as $key2 => $value2)
                {
                    if($value2['form_value'] != '' && $value['form_display'][$index_arr])
                    {
                        $radio .= '   
                            <div class="radio radio-replace radio-inline">
                                <input id="'.$value['form_name'].'Radio-'.$index_arr.'" type="radio" name="'.$value['form_name'].'" value="'. $value2['form_value'] .'">
                                <label for="'.$value['form_name'].'Radio-'.$index_arr.'">'.$value['form_display'][$index_arr].'</label>
                            </div>

                            ';
                    }

                    $index_arr++;
                }

                $template .= '
                    <div class="form-group">
                        <label>'.$value['form_label'].'</label>
                        <div class="clear-fix">'.$radio.'</div>
                    </div>
                ';
                break;
            
            case 'textarea':
                $template .= '
                    <div class="form-group">
                        <label>'.$value['form_label'].'</label>
                        <textarea name="'.$value['form_name'].'" class="form-control"></textarea>
                    </div>
                ';

                break;

            default:
                $template .= '
                    <div class="form-group">
                        <label>'.$value['form_label'].'</label>
                        <input type="'.$value['form_type'].'" name="'.$value['form_name'].'" class="form-control" />
                    </div>
                ';    
                break;
        }
    }

    $no++;
}

$template .= '</form>';

?>

<?=$template;?>