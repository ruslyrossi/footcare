<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
$('#accordion').dcAccordion({
eventType: 'hover',
autoClose: true,
saveState: true,
disableLink: false,
showCount: false,
speed: 'fast'
});
});
</script>
<div class="box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="kdo-box-content">
    <ul id="accordion" class="kdo-category">
      <?php foreach ($categories as $category) { ?>
      <li>
        <a href="<?php echo $category['href']; ?>"<?php if ($category['category_id'] == $category_id) { ?> class="active"<?php } ?>><?php echo $category['name']; ?></a>
        <?php if ($category['children']) { ?>
        <ul>
          <?php foreach ($category['children'] as $child) { ?>
              <li>
                <a href="<?php echo $child['href']; ?>"<?php if ($child['category_id'] == $child_id) { ?> class="active" <?php } ?>> - <?php echo $child['name']; ?></a>
                    <?php if($child['sister_id']){ ?>
                      <ul>
                      <?php foreach($child['sister_id'] as $sisters) { ?>
                        <li>   
                        <a href="<?php echo $sisters['href']; ?>"<?php if ($sisters['category_id'] == $sisters_id) { ?> class="active"<?php } ?>> - <?php echo $sisters['name']; ?></a>
                        </li>
                      <?php } ?>
                      </ul>
                <?php } ?>
              </li>
          <?php } ?>
        </ul>
        <?php } ?>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>
<br />