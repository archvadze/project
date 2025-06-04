<footer>
  <div class="bottom-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <div class="bottom-icons white-color"> 
          <div id="top-ge-counter-container" data-site-id="112208"></div>
            <script async src="//counter.top.ge/counter.js"></script>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
          <div class="grey-color right-holder mt-10">
            <p>Copyright <?php echo lang('sitetitle'); ?> © <?php echo lang('copyright'); ?> | <a href="http://www.bear.ge/" target="_blank" rel="external" class="white"><img src="http://bear.ge/uploads/global/logo.png" alt="bear.ge" width="30"></a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="style/js/bootstrap.min.js" type="text/javascript"></script> 
<!--<script src="style/js/jquery.pogo-slider.min.js" type="text/javascript"></script> 
<script src="style/js/pogo-main.js" type="text/javascript"></script> --> 

<script src="style/js/jquery.counterup.min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<?php /*?><script src="style/js/owl.carousel.js" type="text/javascript"></script> 
<script src="style/js/wow.min.js" type="text/javascript"></script> 
<script src="style/js/isotope.pkgd.min.js" type="text/javascript"></script> 
<script src="style/js/tabs.min.js" type="text/javascript"></script> 
<script src="style/js/modernizr.js" type="text/javascript"></script> 
<script src="style/js/map.js" type="text/javascript"></script> 
<script src="style/js/main.js" type="text/javascript"></script><?php */?>
<script>
$(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ <?php if(isset($_GET['amount1']) && !empty($_GET['amount1'])){ echo $_GET['amount1']; }else{ echo '0';} ?>,<?php if(isset($_GET['amount2']) && !empty($_GET['amount2'])){ echo $_GET['amount2']; }else{ echo '500';} ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( ui.values[ 0 ] + " <?php echo lang('sm'); ?> - " + ui.values[ 1 ] + " <?php echo lang('sm'); ?>" );
		$( "input[name='amount1']" ).val(ui.values[ 0 ]);
		$( "input[name='amount2']" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).html( $( "#slider-range" ).slider( "values", 0 ) +
     " <?php echo lang('sm'); ?> - " + $( "#slider-range" ).slider( "values", 1 ) + " <?php echo lang('sm'); ?>");
  });
  </script> 
<script> 

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
  var id_selector = $(this).attr("id");
  var id = id_selector.substr(id_selector.length -1);
  id = parseInt(id);
  $('#gallery').carousel(id);
  $('[id^=carousel-selector-]').removeClass('selected');
  $(this).addClass('selected');           
});

// when the carousel slides, auto update
$('#gallery').on('slide.bs.carousel', function (e) { 
  var id = $('.item.active').data('slide-number') + 1;
  id = parseInt(id);
  $('[id^=carousel-selector-]').removeClass('selected');
  $('[id=carousel-selector-'+id+']').addClass('selected');
});
         
$('.carousel-control.left').click(function() {
	$('#gallery').carousel('prev');
	var id = $('.item.active').data('slide-number') + 1;
     id = parseInt(id); 
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-'+id+']').addClass('selected');
});

$('.carousel-control.right').click(function() {
    $('#gallery').carousel('next');	 
	var id = $('.item.active').data('slide-number') + 1;
    id = parseInt(id); 
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-'+id+']').addClass('selected');
});
</script> 
<script>
  /* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function(event){
    	event.preventDefault();
    	var content = $('.modal-body');
    	content.empty();      	      	
      	content.html($(this).html());
      	$(".modal-profile").modal({show:true});
    });
</script>
</body></html><?php /*} } else die();*/ ?>