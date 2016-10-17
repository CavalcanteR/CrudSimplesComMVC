
		</div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->
<div class="extra" style="display: none;"  >

	<div class="container">

		<div class="row">

			<div class="span3">

				<h4>About</h4>

				<ul>
					<li><a href="javascript:;">About Us</a></li>
					<li><a href="javascript:;">Twitter</a></li>
					<li><a href="javascript:;">Facebook</a></li>
					<li><a href="javascript:;">Google+</a></li>
				</ul>

			</div> <!-- /span3 -->

			<div class="span3">

				<h4>Support</h4>

				<ul>
					<li><a href="javascript:;">Frequently Asked Questions</a></li>
					<li><a href="javascript:;">Ask a Question</a></li>
					<li><a href="javascript:;">Video Tutorial</a></li>
					<li><a href="javascript:;">Feedback</a></li>
				</ul>

			</div> <!-- /span3 -->

			<div class="span3">

				<h4>Legal</h4>

				<ul>
					<li><a href="javascript:;">License</a></li>
					<li><a href="javascript:;">Terms of Use</a></li>
					<li><a href="javascript:;">Privacy Policy</a></li>
					<li><a href="javascript:;">Security</a></li>
				</ul>

			</div> <!-- /span3 -->

			<div class="span3">

				<h4>Settings</h4>

				<ul>
					<li><a href="javascript:;">Consectetur adipisicing</a></li>
					<li><a href="javascript:;">Eiusmod tempor </a></li>
					<li><a href="javascript:;">Fugiat nulla pariatur</a></li>
					<li><a href="javascript:;">Officia deserunt</a></li>
				</ul>

			</div> <!-- /span3 -->

		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /extra -->

<div class="footer">

	<div class="container">

		<div class="row">
			
		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /footer -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Configuracao::$baseUrl; ?>js/libs/jquery-1.8.3.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/i18n/jquery-ui-timepicker-pt-BR.js"></script>
<script type="text/javascript" src="http://malsup.github.io/jquery.blockUI.js" ></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/bootstrap-tokenfield.min.js"></script>




<script src="<?php echo Configuracao::$baseUrl; ?>js/libs/bootstrap.min.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/dropzone/dropzone.min.js"></script>

<script src="<?php echo Configuracao::$baseUrl; ?>js/plugins/validate/jquery.validate.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/funcoes.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/Application.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/demo/validation.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/jquery.maskMoney.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/jquery.maskedinput.min.js"></script>

<script src="<?php echo Configuracao::$baseUrl; ?>js/plugins/hoverIntent/jquery.hoverIntent.minified.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/plugins/lightbox/jquery.lightbox.min.js"></script>

<script src="<?php echo Configuracao::$baseUrl; ?>js/mascaras.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/evento.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/contaBancaria.js"></script>
<script type="text/javascript" src="<?php echo Configuracao::$baseUrl; ?>js/scripts.js" ></script>

<script src="<?php echo Configuracao::$baseUrl; ?>js/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/jquery.Jcrop.min.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/jquery.color.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/ucwords.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/array_intersect.js"></script>
<script src="<?php echo Configuracao::$baseUrl; ?>js/range.js"></script>
<script src="https://cdn.rawgit.com/fengyuanchen/cropper/v0.11.0/dist/cropper.min.js"></script>

<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

<style>
	td.columns select{width:auto;}
	td.operators select{width:auto;}
	textarea{ width:40%; }
</style>

<script type="text/javascript" charset="utf-8">
	$(function() {
		oTable = $('#tabela').dataTable({
//			"bJQueryUI": true,
//			"sPaginationType": "full_numbers"
      		"aaSorting": [[ 3, "desc" ]]
	  	});

	  	$('textarea').attr('rows', 5);
  	});

</script>

<script type="text/javascript" >
	$(document).ready(function() {
		$('.btn').tooltip();

		$('.buttonControlCheck').bind('click', function(){
			$(this).parents('form').find('input[type=checkbox]').each(function(){
				if( $(this).is(':checked') ) {
					$(this).prop('checked', false);
					$('.buttonControlCheck').text('Marcar todos');
				} else {
					$(this).prop('checked', true);
					$('.buttonControlCheck').text('Desmarcar todos');
				}
			});
		});

        if($('.texto').size() > 0) {
          CKEDITOR.replace($('.texto').attr('id'));
    	  $("form #variaveis").change(function(){
    		  var oEditor = CKEDITOR.instances.texto;
    		  oEditor.insertText($(this).val());
    		  $(this).val('');
    	  });
        }
	});
</script>

<script>
$(function() {
  $( "#tabs" ).tabs();
  $("#tabs").fadeIn('fast');
  $("div[id^=tabs2]" ).tabs();
  $("div[id^=tabs2]").fadeIn('fast');
});
</script>


<script type="text/javascript" src="<?php echo Configuracao::$baseUrl; ?>colorpicker/js/layout.js?ver=1.0.2"></script>
<script>
$(function() {
	$('#colorpicker').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
});
</script>

  </body>
</html>
