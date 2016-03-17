<?php
/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/02/2016
 * Description: FormProcess Class
 *  
 */
 
 require_once('FormController.php');

class FormLocation extends Formcontroller
{
function displayForm() {

?>
<div class="forms">
        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];?>" method="POST">
        <label for="stype">Sport Type: </label>
            <input type="listbox" name="stype" id="stype" required="required"/>
        <input name="process" type="submit">
    </form>
<?php
}


}
?>    
