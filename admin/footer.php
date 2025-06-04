<div class="pull-left"> <a href="http://proeqti.ge">PROEQTI.GE</a> <span>&copy; 2018</span> </div>
<div class="ml-auto pull-right"> <span>Powered by</span> <a href="http://bear.ge">BEAR.GE</a> </div>
<script type="text/javascript">
$(function() {
$(".delete").click(function() {
$('#load').fadeIn();
var commentContainer = $(this).parent();
var id = $(this).attr("id");
var string = 'id='+ id ;
	
$.ajax({
   type: "POST",
   url: "ajax_images.php",
   data: string,
   cache: false,
   success: function(){
	commentContainer.slideUp('slow', function() {$(this).remove();});
	$('#load').fadeOut();
  }
});
  return false;
 });
});
</script>
<script type="text/javascript">
CKEDITOR.replace("text_en");
CKEDITOR.replace("text_ru");
CKEDITOR.replace("text_ge");
</script> 