<html>
<style type="text/css">
.container{
  width: 50%;
  margin: 0 auto;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    width: 50%;
}
button, input {
  padding: 10px;
}
</style>
<body>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<div align="center" class="container">
<form method="POST" action="<?php echo site_url('welcome/edit_file_upload');?>" enctype='multipart/form-data'>
<table border="1">
<?php
    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
    foreach ($edit_data as $key => $data) { 
  ?>
<tr>
<td>Name</td>
<td><input type="text" name="name" value="<?php echo $data['name']; ?>" id="file" placeholder="name"></td>
</tr>
<tr>
<td>Class</td>
<td><input type="text" name="class" value="<?php echo $data['class']; ?>" id="file" placeholder="class"></td>
<input type="hidden" name="user_id" value="<?php echo $data['u_id']; ?>" id="file" placeholder="class">
</tr>
<?php } endif; ?>
<?php
    if(isset($edit_data_image) && is_array($edit_data) && count($edit_data)): $i=1;
    foreach ($edit_data_image as $key => $data) { 
  ?>
<tr class="imagelocation<?php echo $data['id'] ?>">
<td colspan="2" align="center">
<img src="<?php echo base_url(); ?>uploads/<?php echo $data['image']; ?>" style="vertical-align:middle;" width="80" height="80">
<span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data['id'] ?>)">X</span>
</td>
</tr>
<?php }endif; ?>
<tr>
<td>Images</td>
<td><input type="file" name="userfile[]" id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple></td>
</tr>
<tr>
<td colspan="2" align="center"><input style="width: 50%;" type="submit" value="Submit"></td>
</tr>
</table>
</form>
</div>




<script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure you want to delete from this post?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('welcome/deleteimage');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                  };
                  
                }
            });
      }
}
</script>




</body>
</html>