<div class='projects-list'>
  <span class='title black'>Your Next Canvas.</span>
  <ul>
    <?php foreach($project_array as $key => $p) { ?>
      <? if(isset($this_key) && $this_key == $key) { continue; } ?>
      <li class="project <?= $key ?>">
         <a href="/properties/<?= $key ?>">
           <div class='project-background'>
             <img alt="<?= $p['title'] ?>" src="<?= $p['small_image'] ?>" />
           </div>
           <div class='project-foreground'>
             <img class='ribbon-end' src="/images/ribbon_<?= $p['theme'] ?>_sm.png" />
             <div class="<?= $p['theme'] ?> ribbon">
               <span class='f15'><?= $p['title']; ?>.</span>
             </div>
           </div>
         </a>
       </li>
    <? } ?>
    <?php if(!empty($show_retail)) { ?>
      <li class="project retail">
         <a href="/properties/retail-and-warehouse">
           <div class='project-background'>
             <img alt="Retail and Warehouse" src="/images/properties_warehouse_sm.png" />
           </div>
           <div class='project-foreground'>
             <img class='ribbon-end' src="/images/ribbon_black_sm.png" />
             <div class="black ribbon">
               <span class='f15'>Retail and Warehouse.</span>
             </div>
           </div>
         </a>
       </li>
    <?php } ?>
  </ul>
</div>