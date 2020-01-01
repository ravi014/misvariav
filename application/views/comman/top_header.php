<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149622632-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149622632-2');
</script>

   <?php 
    //echo $this->uri->segment(1); 
      $file_typ=$this->uri->segment(1); 
    
       if($file_typ!=""){ 
            $data= $this->comman_fun->  get_table_data('seo_pages_keywords',array('file_name'=>$file_typ)); 
        }else{
            $data= $this->comman_fun->get_table_data('seo_pages_keywords',array('file_name'=>"home"));  
        }
      
     ?>
   <title><?php echo $data[0]['title']; ?></title>
    
    <meta name="Description" content="<?php echo $data[0]['description']; ?>">
    
    <meta name="Keywords" content="<?php echo $data[0]['keywords']; ?>">
    <meta name="viewport" content="width=device-width" />

    <meta charset="UTF-8">

    <title>Muni International Pre School | Variav </title>
    <link href="<?=base_url();?>asset/new_design/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel='stylesheet' href='<?= base_url();?>asset/plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media="screen" />
    <link rel='stylesheet' href='<?= base_url();?>asset/plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url();?>asset/plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url();?>asset/css/style-core.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= base_url();?>asset/css/kingster-style-custom.css' type='text/css' media='all' />
    

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />

    <!-- <script type='text/javascript' src='<?=base_url();?>asset/js/jquery/jquery.js'></script> -->
    
    <script type='text/javascript' src='<?=base_url();?>asset/js/jquery/jquery-3.4.1.min.js'></script>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>asset/new_design/image_stat/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>asset/new_design/image_stat/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>asset/new_design/image_stat/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url();?>asset/new_design/image_stat/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?=base_url();?>asset/new_design/image_stat/ico/favicon.png">

<style type="text/css">
    img.customeimage {
    height: 650px;
}
.gdlr-core-tab-item-content-image-wrap {
    height: 500px !important;
}
.gdlr-core-tab-item-content.gdlr-core-active.align {
    text-align: justify;
}
/*Left Image Height*/
</style>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
