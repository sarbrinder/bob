<?php 
//echo '<pre>';print_r($data[0][0][0]);die;
for($i=0;$i<count($data[0]);$i++){
?>
<tr id="<?php echo $data[0][$i][0]->uniqueId;?>" find="yes" class="addmangerToList">
    <td style="color: red;font-size: large;font-weight: bold;cursor: pointer;" class="removeManger">X</td>
    <td style="font-size: initial;"><?php echo $data[0][$i][0]->fName;?></td>
    <td style="font-size: initial;"><?php echo $data[0][$i][0]->lName;?></td>
    <td style="font-size: initial;"><?php echo $data[0][$i][0]->email;?></td>
</tr>
<?php }?>