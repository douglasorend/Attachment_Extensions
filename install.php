<?php
// If SSI.php is in the same place as this file, and SMF isn't defined...
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
  require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif (!defined('SMF'))
  die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

if((SMF == 'SSI') && !$user_info['is_admin']) 
    die('Admin priveleges required.'); 

//==========================================================================
//                     Regular Attachments support
//==========================================================================
// Figure out where the attachment path(s) are:
if (!empty($modSettings['currentAttachmentUploadDir']))
{
	if (!is_array($modSettings['attachmentUploadDir']))
		$modSettings['attachmentUploadDir'] = unserialize($modSettings['attachmentUploadDir']);
}

// Let's start renaming files to have a "bin" extension:
$request = $smcFunc['db_query']('', '
	SELECT id_attach, file_hash, id_folder
	FROM {db_prefix}attachments',
	array(
));
while ($row = $smcFunc['db_fetch_assoc']($request))
{
	if (!empty($modSettings['currentAttachmentUploadDir']))
		$path = $modSettings['attachmentUploadDir'][$row['id_folder']];
	else
		$path = $modSettings['attachmentUploadDir'];
	$path = $path . '/' . $row['id_attach'] . '_' . $row['file_hash'];
	if (file_exists($path) && is_writable($path))
		rename($path, $path . '.321');
}
$smcFunc['db_free_result']($request);

//==========================================================================
//                       PM Attachments support
//==========================================================================
// Figure out where the attachment path(s) are:
$tblchk = $smcFunc['db_query']('', 'show tables like "{db_prefix}pm_attachments"', array());
while ($row = $smcFunc['db_fetch_assoc']($tblchk))
{
	if (!empty($modSettings['pmCurrentAttachmentUploadDir']))
	{
		if (!is_array($modSettings['pmAttachmentUploadDir']))
			$modSettings['pmAttachmentUploadDir'] = unserialize($modSettings['pmAttachmentUploadDir']);

		// Let's start renaming files to have a "bin" extension:
		$request = $smcFunc['db_query']('', '
			SELECT id_attach, file_hash, id_folder
			FROM {db_prefix}pm_attachments',
			array(
		));
		while ($row = $smcFunc['db_fetch_assoc']($request))
		{
			if (!empty($modSettings['pmCurrentAttachmentUploadDir']))
				$path = $modSettings['pmAttachmentUploadDir'][$row['id_folder']];
			else
				$path = $modSettings['pmAttachmentUploadDir'];
			$path = $path . '/' . $row['id_attach'] . '_' . $row['file_hash'];
			if (file_exists($path) && is_writable($path))
				rename($path, $path . '.321');
		}
		$smcFunc['db_free_result']($request);
	}
}
$smcFunc['db_free_result']($tblchk);
?>
