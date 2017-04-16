<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 14:11
 */

?>

<h2>Library</h2>

<table class="library">
    <tr>
        <th>Title</th>
        <th>ReleaseYear</th>
        <th>Score</th>
    </tr>
    <?php
    foreach ($movies as $movie) {
        ?>
        <tr>
            <td><?php echo $movie->Title;?></td>
            <td><?php echo $movie->ReleaseYear;?></td>
            <?php
            if($movie->Score == null) {
                ?>
                <td>/</td>
                <?php
            }
            else {
                ?>
                <td><?php echo $movie->Score; ?></td>
                <?php
            }
            ?>
            <td>
                <a href="<?php echo base_url();?>main/deleteMovie/<?php echo $movie->Id;?>" class="removeButton"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<a href="<?php echo base_url();?>main/addMovie" class="button textButton shadow">Add a movie</a>