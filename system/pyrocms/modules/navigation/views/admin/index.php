<?php if ( ! empty($groups)): ?>
	<?php foreach ($groups as $group): ?>
	
		<section class="box">
			<header>
				<div class="buttons buttons-small float-left">
					<?php echo anchor('admin/navigation/create/'.$group->id, lang('nav_link_create_title'), 'class="add ajax button"') ?>
				</div>

				<div class="buttons buttons-small float-right">
					<?php echo anchor('admin/navigation/groups/delete/'.$group->id, lang('nav_group_delete_label'), array('class' => "confirm button",  'title' => lang('nav_group_delete_confirm'))) ?>
				</div>
			
				<h3 class="spacer-bottom-half"><?php echo $group->title;?></h3>
			</header>
			
			<?php if ( ! empty($navigation[$group->id])): ?>
				
				<div class="box-container">
					
					<div id="link-list">
						<ol class="sortable">
					
							<?php foreach($navigation[$group->id] as $link): ?>
						
									<li id="link_<?php echo $link['id']; ?>">
										<div>
											<a href="#" rel="<?php echo $link['id']; ?>"><?php echo $link['title']; ?></a>
										</div>

								<?php if(isset($link['children'])): ?>
										<ol>
											<?php $controller->tree_builder($link); ?>
										</ol>
									</li>
								<?php else: ?>
									</li>
								<?php endif; ?>
									
							<?php endforeach; ?>
					
						</ol>
					</div>
					
					<div id="link-details">
						
						<p>
							<?php echo lang('navs.tree_explanation'); ?>
						</p>
						
					</div>
						
					<br class="clear-both" />
						
				</div>
										
				<?php else:?>

				<div class="box-container">
					
					<div id="link-list" class="empty">
						<ol class="sortable">
					
							<p><?php echo lang('nav_group_no_links');?></p>
					
						</ol>
					</div>
					
					<div id="link-details">
						
						<p>
							<?php echo lang('navs.tree_explanation'); ?>
						</p>
						
					</div>
						
					<br class="clear-both" />
						
				</div>
				<?php endif; ?>	
					
		</section>
		
	<?php endforeach; ?>
		
<?php else: ?>
	<div class="blank-slate">
		<h2><?php echo lang('nav_no_groups');?></h2>
	</div>
<?php endif; ?>