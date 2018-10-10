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
$tblchk = $smcFunc['db_query']('', 'show tables like "%pm_attachments"', array());
while ($row = $smcFunc['db_fetch_assoc']($tblchk))
{
	// Let's start renaming files to have a "321" extension:
	$request = $smcFunc['db_query']('', '
		SELECT id_attach, file_hash, id_folder
		FROM {db_prefix}pm_attachments',
		array()
	);
	while ($file = $smcFunc['db_fetch_assoc']($request))
	{
		$path = $modSettings['pmAttachmentUploadDir'];
		$path = $path . '/' . $file['id_attach'] . '_' . $file['file_hash'];
		if (file_exists($path) && is_writable($path))
			rename($path, $path . '.321');
	}
	$smcFunc['db_free_result']($request);
	break;
}
$smcFunc['db_free_result']($tblchk);

//==========================================================================
//                        Avea Media support
//==========================================================================
// Figure out where the attachment path(s) are:
$tblchk = $smcFunc['db_query']('', 'show tables like "%aeva_settings"', array());
while ($row = $smcFunc['db_fetch_assoc']($tblchk))
{
	require_once($sourcedir . "/Aeva-Media.php");
	require_once($sourcedir . "/Aeva-Subs-Vital.php");

	// Determine where the base Aeva Media folder is:
	$request = $smcFunc['db_query']('', '
		SELECT value 
		FROM {db_prefix}aeva_settings
		WHERE name  = "data_dir_path"',
		array()
	);
	$row = $smcFunc['db_fetch_assoc']($request);
	$dir = $row['value'];
	$smcFunc['db_free_result']($request);

	// Let's start renaming files to have a proper extension:
	$request = $smcFunc['db_query']('', '
		SELECT id_file, filename, directory
		FROM {db_prefix}aeva_files
		WHERE id_file > 4',
		array()
	);
	while ($file = $smcFunc['db_fetch_assoc']($request))
	{
		$ext = aeva_getExt($file['filename']);
		$tmp = $dir . '/' . $file['directory'] . '/' . aeva_getEncryptedFilename($file['filename'], $file['id_file']);
		$old = str_replace("_ext." . $ext, "_ext" . $ext, $tmp);
		$new = str_replace("_ext" . $ext, "_ext." . $ext, $tmp);
		if (file_exists($old) && is_writable($old))
			rename($old, $new);
	}
	$smcFunc['db_free_result']($request);
}
$smcFunc['db_free_result']($tblchk);
?>