
<h1>Members area</h1>
<p>You are logged into the members area of myMisdiagnosis.com</p>
<p><div id="infoMessage"><?php echo $message;?></div></p>
<p>myMisdiagnosis.com is a publicly accessible resource of misdiagnosis data from around the globe. You, as a patient or carer, may add your own misdiagnosis information to the system, to assist others in a similar position to you and increase awareness.</p>
	 
<div class="alert alert-success" role="alert">The site is currently in beta as we start to amass data. You may add data by clicking <a href="recordeditor/misdiagnosis">Misdiagnosis Data</a>. </div>
	 

<?php 

$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

if (! $this->ionAuth->isAdmin()) // a logged in user, not not admin
	{

	}
	else // we are an admin
	{
		?>
		
	<table cellpadding=0 cellspacing=10>
		<tr>
			<th><?php echo lang('Auth.index_fname_th');?></th>
			<th><?php echo lang('Auth.index_lname_th');?></th>
			<th><?php echo lang('Auth.index_email_th');?></th>
			<th><?php echo lang('Auth.index_groups_th');?></th>
			<th><?php echo lang('Auth.index_status_th');?></th>
			<th><?php echo lang('Auth.index_action_th');?></th>
			<th>Delete</th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
			  <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
			  <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
			  <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor('auth/edit_group/' . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
				 <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor('auth/deactivate/' . $user->id, lang('Auth.index_active_link')) : anchor("auth/activate/". $user->id, lang('Auth.index_inactive_link'));?></td>
				<td><?php echo anchor('auth/edit_user/' . $user->id, lang('Auth.index_edit_link')) ;?></td>
				<td><?php echo anchor('auth/delete_user/' . $user->id, 'Delete') ;?></td>
			</tr>
		<?php endforeach;?>
	</table>
	
	<p><?php echo anchor('auth/create_user', lang('Auth.index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('Auth.index_create_group_link'))?></p>
		
		
		
		
		<?php
	}
 ?>


