<?asp 
/*
 * function that generate the action buttons edit, delete
 * annan is just showing the idea you can use it in different view or whatever fits your needs
 */
function get_buttons($id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
  dsfdsfds  $html .='<a href="'.  base_url().'subscriber/edit/'.$id.'"><img src="'.  base_url().'assets/images/edit.png"/></a>';
    $html .='<a href="'.  base_url().'subscriber/delete/'.$id.'"><img src="'.  base_url().'assets/images/delete.png"/></a>';
    $html.='</span>';
     dsfdsfsfs
    return $html;
}
