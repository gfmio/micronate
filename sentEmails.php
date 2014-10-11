<?php
	require 'vendor/autoload.php';

echo "TEST";

use EDAM\NoteStore\NoteFilter;
use EDAM\NoteStore\NotesMetadataResultSpec;

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

echo $getSentEmails;
(float) $getSentEmails = trim($getSentEmails);

$email = "muriel.binder@gmail.com";
$pw = "micronate";

(float)$donateAmount = 0.1;

echo "spende: ".$donateAmount*$getSentEmails;
?>

<div class="">

	<form action='javascript:savePersonaData()'>
		<label><h1>Personal information</h1></label><br>
		<table width="60%">
			<tr>
				<td><label>name</label></td>
				<td><input type='text' value='Muriel Binder' width="100%"></td>
			</tr> 
			<tr>
				<td><label>email</label></td>
				<td><input type='text' value='muriel.binder@gmail.com' width="100%"></td>
			</tr>
			<tr>
				<td><label>password</label></td>
				<td><input type='password' value='micronate' width="100%"></td>
			</tr>
			<tr>
				<td><label>paying plan</label></td>
				<td> 
					<select>
					  <option value="gmail">sent Emails</option>
					  <option value="evernoate">created notes on evernote</option>
					  <option value="twitter">number of tweets</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td><label>paymant information:</label></td>
				<td><label>We do know them but not want tho share with hackzurich</label>&nbsp; &nbsp; &nbsp; &nbsp; <button>change</button></td>
			</tr>
		</table>
	</form>

	<hr width="80%">

	<h1>you will spend CHF <?php echo $donateAmount*$getSentEmails; ?> this month to the Project of your choosing </h1>

	<button>Jetzt Spenden!</button>
</div>