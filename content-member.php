<li class="member">
    <div class="member_link">
        <?php if(get_field("image")): ?>
        <figure>
            <img class="member_img" src="<?php the_field("image"); ?>" alt="<?php the_title(); ?>" width=180 height=180 >
        </figure>
        <?php else: ?>
        <figure>
            <img class="member_img" src="<?php echo get_template_directory_uri() . '/assets/images/no-image.png' ?>" alt="<?php the_title(); ?>" width=180 height=180 >
        </figure>
        <?php endif; ?>
        <div class="member_info">
            <?php if(get_field("number")): ?>
                <p class="member_number">
				    <?php the_field("number"); ?>
			    </p><!-- /.member_number -->
 			<?php else: ?>
				<div style="height:60px"></div>
			<?php endif; ?>
            <p class="member_name"><?php the_title(); ?></p><!-- /.member_name -->
            <p class="member_position"><?php the_field("position"); ?></p><!-- /.member_position -->
        </div><!-- /.member_info -->
    </div><!-- /.member_link -->
</li><!-- /.member -->

