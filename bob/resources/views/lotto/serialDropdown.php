 <option value="">Select Serial</option>
<?php if(count($list) > 0 ) {
foreach($list as $serial){
?>
<option value="<?php echo $serial->uniqueId;?>"><?php echo $serial->serial;?></option>
<?php }}?>