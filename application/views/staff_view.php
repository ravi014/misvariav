
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/componenttbl.css" />
<!--[if !IE]><!-->
	<style>
	
	
	</style>
<!-- Being Page Title -->

<div class="gdlr-core-pbf-wrapper " id="div_1dd7_79">
                        <div class="gdlr-core-pbf-background-wrap" id="div_1dd7_80"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                                        
                                        <div class="gdlr-core-tab-item-content-image-wrap clearfix">
                                            <div class="gdlr-core-tab-item-image  gdlr-core-active" data-tab-id="1">
                                                <img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
                                            </div>
                                           
                                        </div>

                                        <div class="gdlr-core-tab-item-wrap">
                                            <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                                                <a href="<?=base_url()?>index.php/curricular"><div class="gdlr-core-tab-item-title  " data-tab-id="1">Curricular</div></a>
                                                <a href="<?=base_url()?>index.php/affiliation"><div class="gdlr-core-tab-item-title " data-tab-id="1">Affiliation</div></a>
                                                <a href="<?=base_url()?>index.php/staff"><div class="gdlr-core-tab-item-title gdlr-core-active" data-tab-id="1">Staff</div></a>
                                            </div>
                                            <div class="gdlr-core-tab-item-content-wrap clearfix">
                                                <div class="gdlr-core-tab-item-content  gdlr-core-active align" data-tab-id="1" >
                                                     
                                                           <table class="table">
                                                            	<thead>
                                                            		<tr>
                                                            			<th>S.No</th>
                                                            			<th>Name of the Employee</th>
                                                            			<th>Designation</th>
                                                            			<th>Qualification</th>
                                                            			<?php /*?> <th>Taching Subject</th><?php */?>
                                                            		</tr>
                                                            	</thead>
                                                            	<tbody>
                                                            		<?php $no=1; for($i=0;$i<count($all);$i++)

                                                            			{
                                                            				?>
                                                            				<tr>
                                                            					<td><?php echo $no++; ?></td>
                                                            					<td><?=$all[$i]['name']?></td>
                                                            					<td><?=$all[$i]['designation']?></td>
                                                            					<td><?=$all[$i]['qualification']?></td>
                                                            					<?php /*?><td><?=$all[$i]['subject']?></td><?php */?>
                                                            				</tr>
                                                            				<?php 
                                                            			
                                                            		}?> 
                                                            	</table>
                                                          
                                                        
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<style type="text/css">
    .gdlr-core-tab-item .gdlr-core-tab-item-image {
    height: 89% !important;
}
</style>