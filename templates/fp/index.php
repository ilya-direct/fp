<?php // no direct access 
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$showLeftColumn = (bool) $this->countModules('position-7');
$showRightColumn = (bool) $this->countModules('position-6');
$showRightColumn &= JRequest::getCmd('layout') != 'edit';

$margin = 30;
$outermargin = 0;
$logoText	= $this->params->get("logoText","GALAXY");
$slogan	= $this->params->get("slogan","Joomla template from a4joomla.com");
$pageWidth	= $this->params->get("pageWidth", "960");
$pageWidth	= $pageWidth - $outermargin;
$rightColumnWidth	= $this->params->get("rightColumnWidth", "190");
$leftColumnWidth	= $this->params->get("leftColumnWidth", "190");
$logoWidth	= $this->params->get("logoWidth", "400");
$removeBanner = $this->params->get("removeBanner", "No");

if($this->countModules('position-0')){
$searchWidth = 170;
} else {
$searchWidth = 0;
}
$headerrightWidth = $pageWidth + $outermargin - $logoWidth - 50;
$searchHeight = 33;
if ($showLeftColumn && $showRightColumn) {
   $contentWidth = $pageWidth - $leftColumnWidth - $rightColumnWidth - 3*$margin;
} elseif (!$showLeftColumn && $showRightColumn) {
   $contentWidth = $pageWidth - $rightColumnWidth - 2*$margin ;
} elseif ($showLeftColumn && !$showRightColumn) {
   $contentWidth = $pageWidth - $leftColumnWidth - 2*$margin ;
} else {
   $contentWidth = $pageWidth - $margin ;
}
JHTML::_('behavior.framework', true);  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<?php
// здесь представлен список js скриптов отключаемых  при загрузки
unset($this->_scripts[$this->baseurl.'/media/system/js/mootools-core.js'], 
	$this->_scripts[$this->baseurl.'/media/system/js/mootools-more.js'],
	$this->_scripts[$this->baseurl.'/media/system/js/core.js'],
	$this->_scripts[$this->baseurl.'/media/system/js/caption.js']);
?>
<jdoc:include type="head" />
<script src="http://vk.com/js/api/openapi.js?108" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/grey.css" type="text/css" />
<!--[if IE 6]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<style type="text/css">
img, div, a, input { behavior: url(<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/iepngfix.htc) }
#topmenuwrap, div.moduletable h3, div.moduletable_menu h3, #search input.inputbox { behavior:none;}
</style>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/iepngfix_tilebg.js" type="text/javascript"></script>
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie67.css" type="text/css" />
<![endif]-->
<!--[if lte IE 8]>
<style type="text/css">
#topmenuwrap, div.moduletable h3, div.moduletable_menu h3, #search input.inputbox { behavior: url(<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/PIE.php) }
</style>
<![endif]-->
<style type="text/css">
 #logo {
    width:<?php echo $logoWidth; ?>px;
 }
 #headerright {
    width:<?php echo $headerrightWidth; ?>px;
	<?php if($this->countModules('banner') || $removeBanner == "Yes") : ?>
       background: none;   
    <?php endif; ?>
 } 
 #search {
   width:<?php echo $searchWidth; ?>px;
   height:<?php echo $searchHeight; ?>px;
 }
</style>
</head>
<body>
<div id="allwrap" class="gainlayout" style="width:<?php echo $pageWidth + $outermargin; ?>px;">
<div id="headerwrap" class="gainlayout">
  <div id="header" class="gainlayout">   
      <div id="logo" class="gainlayout">
         	<h2><a href="<?php echo JURI::base(); ?>" title="<?php echo htmlspecialchars($logoText); ?>"><?php echo htmlspecialchars($logoText); ?></a></h2>
			<h3><?php echo htmlspecialchars($slogan); ?></h3> 
      </div>
	  <div id="headerright" class="gainlayout">
        <?php if($this->countModules('banner')) : ?>
          <div id="banner">
            <jdoc:include type="modules" name="banner" style="xhtml" /> 
          </div>
        <?php endif; ?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
  </div>	  
  <div class="clr"></div>
</div>

<div id="topmenuwrap" class="gainlayout">
  <?php if($this->countModules('position-1')) : ?>
         <div id="topmenu" class="gainlayout">
           <jdoc:include type="modules" name="position-1" style="xhtml" />
           <div class="clr"></div>
         </div> 
  <?php endif; ?>
  <?php if($this->countModules('position-0')) : ?>
        <div id="search" class="gainlayout">
          <jdoc:include type="modules" name="position-0" style="xhtml" /> 
		<div class="clr"></div>  
        </div>
  <?php endif; ?>
  <div class="clr"></div>
</div> 

<div id="wrap" class="gainlayout">

  <?php if($this->countModules('position-2')) : ?>
	  <div id="pathway" class="gainlayout">
        <jdoc:include type="modules" name="position-2" />
      <div class="clr"></div>
	  </div>
  <?php endif; ?> 
  <div id="cbody" class="gainlayout">
  <?php if($showLeftColumn) : ?>
  <div id="sidebar" style="width:<?php echo $leftColumnWidth; ?>px;">     
      <jdoc:include type="modules" name="position-7" style="xhtml" />    
  </div>
  <?php endif; ?>
  <div id="content60" style="width:<?php echo $contentWidth; ?>px;">    

      <?php if ($this->getBuffer('message')) : ?>
				<div class="error">
					<jdoc:include type="message" />
				</div>
	  <?php endif; ?>
      <div id="content" class="gainlayout">
      <jdoc:include type="component" /> 
      </div>   
  </div>
  <?php if($showRightColumn) : ?>
  <div id="sidebar-2" style="width:<?php echo $rightColumnWidth; ?>px;">     
      <jdoc:include type="modules" name="position-6" style="xhtml" />     
  </div>
  <?php endif; ?>
  <div class="clr"></div>
  </div>

  <!--end of wrap-->
</div>
    
<!--end of allwrap-->
</div>
<div id="footerwrap" class="gainlayout" style="width:<?php echo $pageWidth + $outermargin; ?>px;"> 
  <div id="footer" class="gainlayout">  
       <?php if($this->countModules('position-14')) : ?>	
         <jdoc:include type="modules" name="position-14" style="xhtml" />    
       <?php endif; ?>
  </div>

</div>

<!-- RedHelper -->
<!--
<style>
#rh-copy {
display:none !important;
</style>
<script id="rhlpscrtg" type="text/javascript" charset="utf-8" async="async" 
	src="https://web.redhelper.ru/service/main.js?c=ilya007">
</script> 
-->

<!--/Redhelper -->
</body>
</html>
