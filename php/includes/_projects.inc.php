<div class='projects-list'>
  <span class='title black'>Your Next Canvas.</span>
  <ul>
    <?php foreach($project_array as $key => $p) { ?>
      <? if(isset($this_key) && $this_key == $key) { continue; } ?>
      <li class="project <?= $key ?>">
         <a href="/properties/property.php?key=<?= $key ?>">
           <div class='project-background'>
             <img alt="<?= $p['title'] ?>" src="<?= $p['small_image'] ?>" />
           </div>
           <div class='project-foreground'>
             <img class='ribbon-end' src="/images/ribbon_<?= $p['theme'] ?>_sm.png" />
             <div class="<?= $p['theme'] ?> ribbon">
               <!-- removes the period from title -->
               <span class='f15'><?php echo substr($p['title'],0,-1); ?></span>
             </div>
           </div>
         </a>
       </li>
    <? } ?>
  </ul>
</div>