<?php

require __DIR__.'/../vendor/autoload.php';

use EDAM\NoteStore\NoteFilter;
use EDAM\NoteStore\NotesMetadataResultSpec;

class SentEmailsView extends SimpleView {
	function _render() { ?>

<?php
//require_once 'Evernote/Client.php';

mb_internal_encoding("UTF-8");


function getNoteContent(){
//require __DIR__ . '/../../vendor/autoload.php';
//prod token
$token = 'S=s1:U=8fa6a:E=1505838d54e:C=1490087a8f8:P=1cd:A=en-devtoken:V=2:H=27b8705e54e6abbd8dd6c03196cf5d16';
//set this to false to use in production
$sandbox = true;
$client = new \Evernote\Client($token, $sandbox);
$advancedClient = $client->getAdvancedClient();
//$note_store_url = $user_store->getNoteStore($note_store_url);
$userStore = $advancedClient->getUserStore();
$noteStoreUrl = $userStore->getNoteStoreUrl($token);
$note_store = $advancedClient->getNoteStore($noteStoreUrl);
$notebooks = array();
$notebook = $note_store->getDefaultNotebook($token);


//foreach ($notebooks as $notebook) {


$guid =  $notebook->guid;

//}

$notebook_filter = new NoteFilter();
$notebook_filter->guid = $guid;
$result_spec = new NotesMetadataResultSpec();
$result_spec->includeTitle=True;
$noteList = $note_store->findNotesMetadata($token, $notebook_filter,0 , 40000, $result_spec);

foreach($noteList->notes as $note){
	$noteGuid = $note->guid;
}

$content = $note_store->getNote($token, $noteGuid, true, false, false, false);

return $content->content;

}

$noteContent = getNoteContent();

$firstSelector = "to me";
$secondSelector = "emails sent";

$firstPos = strPos($noteContent, $firstSelector);
$secondPos = strPos($noteContent, $secondSelector);
$startpos = $firstPos + 5;
$getSentEmails = subStr($noteContent, $startpos, $secondPos-$startpos);

(float) $getSentEmails = trim($getSentEmails);

$email = "muriel.binder@gmail.com";
$pw = "micronate";

(float)$donateAmount = 0.1;

 $headerView = new HeaderView(); echo $headerView->render(); ?>

<div class="frame full-width full-height bg-darker-grey parallax hpadding-small">
<div class="vcenter">
	<div class="center text-white" id="title-content">
		<h1 class="text-center text-xxhuge container center vmargin-medium">
			<span class="text-orange">m</span><span class="text-turquois">N</span>
		</h1>


<div class="frame text-center full-width text-small hpadding-large hmargin-large">
	<div class="credentials-box text-darker-grey left">
	<form action='javascript:savePersonaData()' >
		<p class="text-large text-white">Personal information</p>
			<input type='text' name="name" value='Muriel Binder' placeholder="Name" class="field">
			<input type='text' name="email" value='muriel.binder@gmail.com' placeholder="Email" class="field">
			<input type='password' name="pwd" value='micronate' placeholder="Password" class="field">
					<select name="pymentplan">
					  <option value="gmail">sent Emails</option>
					  <option value="evernoate">created notes on evernote</option>
					  <option value="twitter">number of tweets</option>
					</select>
			<input type="text" name="paymentInfo" value="Erfasst"> &nbsp; &nbsp; <button class="button bg-orange text-white">change</button>
	</form>
</div>
	<div class="credentials-box text-large right">
		Sent Email Statistic:<br>
		You've sent <?php echo $getSentEmails; ?> Emails in the Month September!

	</div>
</div>
<div class="frame text-center text-large hpadding-large hmargin-large">
	<hr class="text-grey" width="60%">

	<p>you will spend CHF <?php echo $donateAmount*$getSentEmails; ?> this month to the Project of your choosing</p>

	<button class="button text-large bg-orange">Jetzt Spenden!</button>
</div>
</div>
</div>
</div>

<?php
	}
}
