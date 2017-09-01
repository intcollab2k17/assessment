<form class="form-horizontal">																	
		<a  data-placement="bottom" title="Download" id="<?php echo $row2['upload_id']; ?>Download" href="../uploads/<?php echo $row1['post_file']; ?>">
			<img class="attachment-img" src="../images/<?php echo $display; ?>" style="width:100px">
			<div class="note note-info">
				<h4 class="attachment-heading"><?php echo $row1['post_file'];?></h4>
				<div class="attachment-text">
					<?php 
						include("size.php");	
					?>
  		 		</div><!-- /.attachment-text -->
			</div><!-- /.attachment-pushed -->
		</a>	
</form>