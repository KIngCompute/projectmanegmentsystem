<div class="nav-bar">
	<ul id="nav">
		<?php $dash = activate_menu('dashboard');
		$project = activate_menu('project');
		$client = activate_menu('client');
		$task=activate_menu('task');
		?>
		<li <?php echo $dash; ?>> <?php echo anchor('dashboard','<span>Dashboard</span>');?></li>
		<li <?php echo $project; ?>> <?php echo anchor('project','<span>Projects</span>');?></li>
        <li <?php echo $client ?>> <?php echo anchor('client','<span>Clients</span>');?></li>
         <li <?php echo $task ?>> <?php echo anchor('task','<span>Tasks</span>');?></li>
		
		
		
		
		
		
	</ul>
</div>