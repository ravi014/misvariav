<!-- page heading start-->

<div class="page-heading">
	<h4>
                Transfer Certificate 
            </h4>

	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
		</li>
		<li> <a href="<?php echo base_url(); ?>index.php/news">Transfer Certificate</a>
		</li>
		<li class="active">
			<?=$segment['mode']?> Transfer Certificate</li>
	</ul>

</div>

<?php
if ( $segment[ 'mode' ] == 'Add' ) {
	$btnlable = "Insert";
	$img_rq = 'data-rule-required="true"';
	$er = $this->uri->segment( 4 );
} else {
	$btnlable = "Update";
	$img_rq = "";
	$er = $this->uri->segment( 5 );
}

?>
<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css"/>
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$( document ).ready( function ( e ) {
		$( '.default-date-picker' ).datepicker( {
			format: 'dd-mm-yyyy',
			autoclose: true
		} );
	} );
</script>

<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading"> Transfer Certificate
					<?=$segment['mode']?>
				</header>
				<div class="panel-body">
					<form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" enctype="multipart/form-data">

						<?php if($this->session->flashdata('show_msg')!=''){?>
						<div class="alert alert-danger fade in">
							<button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
							<?=$this->session->flashdata('show_msg');?>
						</div>
						<?php } ?>

						<?php if($er=='er'){ ?>
						<!--<p id="msg">error: Image size 450*400</p>	-->
						<?php }?>

						<div class=" form">
							<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>"/>
							

							<input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>"/>
							<input type="hidden" name="eid" id="eid" value="<?=$segment['eid']?>"/>
							
							<div class="form-group ">

								<label for="cname" class="control-label col-lg-2"><strong>First Name</strong></label>
								<div class="col-lg-3">
									<input type="text" class="form-control" required name="f_name" id="f_name" value="<?php echo set_value('f_name', ''.$result[0]['f_name'].''); ?>"/>
									<?php echo form_error('f_name', '<p class="error">', '</p>'); ?>

								</div>

								<label for="cname" class="control-label col-lg-2"><strong>Middle Name</strong></label>
								<div class="col-lg-3">
									<input class="form-control" required name="m_name" id="m_name" type="text" value="<?php echo set_value('m_name', ''.$result[0]['m_name'].''); ?>"/>
									<?php echo form_error('m_name', '<p class="error">', '</p>'); ?>

								</div>

							</div>
							
							<div class="form-group ">

								<label for="cname" class="control-label col-lg-2"><strong>Last Name</strong></label>
								<div class="col-lg-3">
									<input type="text" class="form-control" required name="l_name" id="l_name" value="<?php echo set_value('l_name', ''.$result[0]['l_name'].''); ?>"/>
									<?php echo form_error('l_name', '<p class="error">', '</p>'); ?>

								</div>

								<label for="cname" class="control-label col-lg-2"><strong>SLC No</strong></label>
								<div class="col-lg-3">
									<input class="form-control" required name="slc_no" id="slc_no" type="text" value="<?php echo set_value('slc_no', ''.$result[0]['slc_no'].''); ?>"/>
									<?php echo form_error('slc_no', '<p class="error">', '</p>'); ?>

								</div>

							</div>
							<div class="form-group ">

								<label for="cname" class="control-label col-lg-2"><strong>SLC</strong></label>
								<div class="col-lg-3">
									<input class="form-control" name="file" id="file" required onChange="Checkfiles();" type="file"/>
									
								</div>
								
								

							</div>
							
							<div class="form-group" align="center">
								<button type="submit" class="btn btn-primary">
									<?=$btnlable?>
								</button>
								<a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a>
								</div>

						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
</div>
<!-------End col-sm-12------------>


<!--body wrapper end--> 

<style>
	.error {
		font-weight: bold;
		color: #F00;
	}
	
	#err {
		color: #F00;
	}
	
	#msg {
		color: #F00;
		font-size: 16px;
	}
</style>

<script>
	//$( document ).ready( function ( e ) {
//
//		////////////
//		$( "#frm-vali" ).validate( {
//			rules: {
//				news_title: "required",
//
//
//			},
//			messages: {
//				news_title: "News title is required",
//
//
//			}
//		} );
//		///////////
//
//	} );
</script>

<script>
	function Checkfiles() {

		var fup = document.getElementById( 'file' );
		var fileName = fup.value;
		var ext = fileName.substring( fileName.lastIndexOf( '.' ) + 1 );
		var ext = ext.toLowerCase();
		if ( ext == "pdf" ) {
			return true;
		} else {
			alert( "Upload pdf only" );
			fup.value = "";
			return false;
		}
	}
</script>