<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function dbbackup($path, $fileName)
{
	//$path= 'assets/dbbackup/';
	//$fileName= "backup_on_" . date("d_m_Y_h_i_s_a") . ".zip";
	$dataDriver = &get_instance();
	$dataDriver->load->dbutil();
	$prefs = array(
		'format' => 'zip',
		'filename' => 'my_db_backup.sql'
	);
	$backup = &$dataDriver->dbutil->backup($prefs);
	$save = $path . $fileName;
	$dataDriver->load->helper('file');
	write_file($save, $backup);
	$dataDriver->load->helper('download');
	force_download($fileName, $backup);
}

function emailSend($emailTo, $senderEmail, $emailSubject, $attachedFile, $emailTemplete, $dynamicData)
{
	//$emailTemplete = 'frontend/emaildesign';
	//$attachedFile = './Brochure.pdf';
	$dataDriver = &get_instance();
	$dataDriver->load->library('email');
	$config = array(
		'charset' => 'utf-8',
		'wordwrap' => TRUE,
		'mailtype' => 'html'
	);
	$dataDriver->email->initialize($config);
	$dataDriver->email->set_newline("\r\n");
	$mesg = $dataDriver->load->view($emailTemplete, $dynamicData, true);
	$dataDriver->email->to($senderEmail);
	$dataDriver->email->from($emailTo, 'Request Message');
	$dataDriver->email->subject($emailSubject);
	$dataDriver->email->message($mesg);
	$dataDriver->email->attach($attachedFile);
	$dataDriver->email->send();
}
