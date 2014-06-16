        </div>
    
<!--    <div class="social-part">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fstepcarehealthfootwear&amp;width=1150&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:258px;" allowTransparency="true"></iframe>    </div>-->

</div>

<div id="footer">

<?php if ($informations) { ?>
<div class="column">
   <h3 class="click"><?php echo $text_information; ?></h3>
   <ul>
      <?php foreach ($informations as $information) { ?>
      <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
      <?php } ?>
   </ul>
</div>
<?php } ?>
<div class="column">
   <h3 class="click">Products</h3>
   <ul>
      <li><a href="<?php echo $contact; ?>">Diabetic Health Shoes</a></li>
      <li><a href="<?php echo $return; ?>">Ladies Health Shoes (Low Heel)</a></li>
      <li><a href="<?php echo $sitemap; ?>">Ladies Health Shoes (Medium Heel)</a></li>
      <li><a href="<?php echo $sitemap; ?>">Man Health Shoes</a></li>
   </ul>
</div>
<div class="column">
   <h3>Outlets</h3>
   <ul>
      <li><a href="#">Malaysia</a></li>
      <li><a href="#">Australia </a></li>
      <li><a href="#">Thailand </a></li>
      <li><a href="#">Online Shop</a></li>
   </ul>
</div>
<div class="column">
   <h3><?php echo $text_extra; ?></h3>
   <ul>
      <li><a href="#">Newspaper</a></li>
      <li><a href="#">Testimonials</a></li>
      <li><a href="#">Foot Care Tips</a></li>
   </ul>
</div>
<div class="column">
	<h3>Contact</h3>
   <ul>
      <?php if($this->config->get('bigshop_mobile') != '') { ?>
      <li><a href="tel:<?php echo $this->config->get('bigshop_mobile'); ?>">Tel: <?php echo $this->config->get('bigshop_mobile'); ?></a></li>
      <?php } ?>
      <?php if($this->config->get('bigshop_fax') != '') { ?>
      <li><a href="#">Fax: <?php echo $this->config->get('bigshop_fax'); ?></a></li>
      <?php } ?>
      <?php if($this->config->get('bigshop_email') != '') { ?>
      <li><a href="mailto:<?php echo $this->config->get('bigshop_email'); ?>" >Email: <?php echo $this->config->get('bigshop_email'); ?></a></li>
      <?php } ?>
   </ul>
</div>
<div class="social">
   <?php if($this->config->get('bigshop_facebook_id') != '' || $this->config->get('bigshop_twitter_username') != '' || $this->config->get('bigshop_gplus_id') != '') { ?>
   <?php } ?>
   <?php if($this->config->get('bigshop_facebook_id') != '') { ?>
   Join us at <a href="http://facebook.com/<?php echo $this->config->get('bigshop_facebook_id'); ?>" target="_blank"><img src="catalog/view/theme/bigshop/image/facebook.png" alt="Facebook" title="Facebook" style="vertical-align:top"></a>
   <?php } ?>
   <?php if($this->config->get('bigshop_twitter_username') != '') { ?>
   <a href="https://twitter.com/#!/<?php echo $this->config->get('bigshop_twitter_username'); ?>" target="_blank"> <img src="catalog/view/theme/bigshop/image/twitter.png" alt="Twitter" title="Twitter"> </a>
   <?php } ?>
   <?php if($this->config->get('bigshop_gplus_id') != '') { ?>
   <a href="https://plus.google.com/u/0/<?php echo $this->config->get('bigshop_gplus_id'); ?>" target="_blank"> <img src="catalog/view/theme/bigshop/image/gplus.png" alt="Google+" title="Google+"> </a>
   <?php } ?>
   <?php if($this->config->get('bigshop_pint_id') != '') { ?>
   <a href="http://pinterest.com/<?php echo $this->config->get('bigshop_pint_id'); ?>" target="_blank"> <img src="catalog/view/theme/bigshop/image/pinterest.png" alt="Pinterest" title="Pinterest"> </a>
   <?php } ?>
</div>
<div class="clear"></div>
<div id="powered">&copy; 20<?php echo date('y'); ?> Footlink.com. All rights reserved. <div class="footer_card"/></div></div>
</div>

<!-- Always display grid layout-->
<script type="text/javascript">$(document).ready(function() { display('grid'); });</script>

<!-- Footer collapase-->
<script>
/*var width = $(document).width();

if(width < 770) {
	var pointer = $('#footer .column');
	
	$(pointer).click(function(event) {
		event.preventDefault();
		
		function run(i) {
			$('#footer .column ul').slideUp();
			$(i).find("ul").slideToggle();
		}
		
		var t = $(this);
		
		//run(t);
		
		setTimeout(run(t),2000);
	});
}*/
</script>

</body></html>