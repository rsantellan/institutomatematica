<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <a name="top" id="top"></a>
    <center>
      <div id="menu">
          <a href="#top">home</a> <a href="#intro">introduction</a> 
          <a href="#css">css &amp; xhtml</a> 
          <a href="#about">about the author</a> 
      </div>
      
      <div id="header">
          <h1>Plain Blue</h1>
          <h2>A simple CSS &amp; XHTML web template focusing on whitespace and its importance </h2>
      </div>
      <div id="content">
        <?php echo image_tag('logo.jpg', array('class'=>'logo'));?>
        <p class="introduction">
            Hello and welcome to Plain-blue. This is a simple web site template 
            maximising the use of css and xhtml. Whitespace is used in abundance to really push its 
            importance in web design. Navigate the page via the menu at the top of the page, or the 
            links underneath this paragraph.
        </p>
        <!--
        <div id="sidebar">
          <h1>Sub Menu</h1>
          <div class="submenu">
            <a href="#top">Home</a>				  
            <a href="#intro">Introduction</a>				
            <a href="#css">CSS &amp; XHTML</a>				
            <a href="#about">About</a>				 
          </div>
        </div>            
        -->
        <div id="mainbar">  
						<h1><a name="intro" id="intro"></a>Introduction</h1>
            <?php echo $sf_content ?>
        </div>
      </div>
      <div id="footer">
          This is the footer. Put all your copyright info here.<br />
          Page designed by 
          <a href="http://www.sixshootermedia.com">6ix Shooter Media</a> 
          extra modificated by 
          <a href="mailto:mcposeidon@mcville.net">Pos3idon</a>
      </div>      
    </center>    
  </body>
</html>
