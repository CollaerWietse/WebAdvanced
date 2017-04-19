<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 16/04/2017
 * Time: 10:08
 */

/**
 * set_value() vult de velden in met de waardes die ingegeven waren voor de validatie van het formulier.
 * Wanneer er een validatieerror is, zal de gebruiker de velden niet opnieuw moeten invullen.
 *
 * $errors: bevat de validatie errors als die er zijn.
 */
?>

<h2>Add a movie</h2>


<?php
//Geeft een form-tag weer op de pagina.
echo form_open(base_url() . "main/addMovie");?>
<table class="formTable">
    <tr>
        <td class="narrow">Title</td>
        <td>
            <div class="inputField big">
                <input type="text" name="title" value="<?php echo set_value('title');?>" id="title" class="input big">
            </div>
        </td>
    </tr>
    <tr>
        <td class="narrow">ReleaseYear</td>
        <td>
            <div class="inputField big">
                <input type="text" name="releaseYear" value="<?php echo set_value('releaseYear');?>" id="releaseYear" class="input big">
            </div>
        </td>
    </tr>
    <tr>
        <td class="narrow">Score</td>
        <td>
            <div class="inputField big">
            <input type="text" name="score" value="<?php echo set_value('score');?>" id="score" class="input big">
            </div>

        </td>
    </tr>
</table>
<p><?php echo $errors;?></p>
<input type="submit" class="button textButton" value="Add movie">
<?php echo form_close();?>
