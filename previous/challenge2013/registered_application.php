<?php
	require_once( dirname(__FILE__) . '/template/header.php');
	require_once( dirname(__FILE__) . '/template/footer.php');
	
	require_once dirname(__FILE__) . '/util/lod_db.php';
	require_once dirname(__FILE__) . '/util/password_manager.php';
	require_once dirname(__FILE__) . '/util/base.php';	
	require_once dirname(__FILE__) . '/util/send_mail.php';
	require_once dirname(__FILE__) . '/util/mail_template.php';

	date_default_timezone_set('Asia/Tokyo'); /*  set TimeZone */
	$sm = SendMail::getInstance();
	$db = LodDb::getInstance();
	$pm = PasswordManager::getInstance();
	$pageTitle = "アプリケーション登録完了";
	if($_POST){
		if(isset($_POST['id'])){ 

			$db->executeUpdate(
 				"update application_2013 set name = '".$_POST['name']."' , affiliation = '".$_POST['affiliation']."' , affiliation_anonymous = ".$_POST['affiliation_anonymous']." , is_student = ".$_POST['is_student'].
				" , email = '".$_POST['email']."' , email_anonymous = ".$_POST['email_anonymous']." , set_mailinglist = ".$_POST['set_mailinglist'].
				" , application_name = '".$_POST['application-name']."', url = '".$_POST['application-url']."' , abstract = '".$_POST['application-abstract']."' , description = '".$_POST['application-description'].
				"' , used_dataset_ids = '".$_POST['application-used-dataset'].
				"' , related_dataset_ids = '".$_POST['related-dataset'].
				"' , related_idea_ids = '".$_POST['related-idea'].
				"' , related_application_ids = '".$_POST['related-application'].
				"' , related_visualization_ids = '".$_POST['related-visualization'].
				"' , related_basetechnology_ids = '".$_POST['related-basetechnology'].
				"' , license = '".$_POST['license']."' , timestamp = '".date('c')."' , copyright = '".$_POST['right']."' ".
				"where id = ".$_POST['id']);
				
			$db->executeUpdate( // input history
				"insert into application_input_2013 (master_id, name, affiliation, affiliation_anonymous, is_student, email, email_anonymous, set_mailinglist, application_name, url, abstract, description, used_dataset_ids, related_dataset_ids, related_idea_ids, related_application_ids, related_visualization_ids, related_basetechnology_ids, copyright, timestamp, license) ".
				"values(".$_POST['id'].", '".$_POST['name']."', '".$_POST['affiliation']."', ".$_POST['affiliation_anonymous'].", ".$_POST['is_student'].", '".$_POST['email']."', ".$_POST['email_anonymous'].", ".$_POST['set_mailinglist'].", '".
					$_POST['application-name']."', '".$_POST['application-url']."', '".$_POST['application-abstract']."', '".$_POST['application-description']."', '".$_POST['application-used-dataset']."', '".
					$_POST['related-dataset']."', '".$_POST['related-idea']."', '".$_POST['related-application']."', '".$_POST['related-visualization']."', '".$_POST['related-basetechnology']."', '".
					$_POST['right']."', '".date('c')."', '".$_POST['license'].
					"')");
			// redirect
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: ".BASE_URL."show_status.php?id=a".sprintf("%03d", $_POST['id']).'&modified=true');
			exit();
		} else {
			$password = $pm->randomString(8);
			$hash = $pm->password($password);
			$result = $db->executeQuery("select * from application_2013 where name = '".$_POST['name']."' and affiliation = '".$_POST['affiliation']."' and affiliation_anonymous = ".$_POST['affiliation_anonymous']." and email = '".$_POST['email']."' and email_anonymous = ".$_POST['email_anonymous'].
				" and application_name = '".$_POST['application-name']."' and url = '".$_POST['application-url']."' and abstract = '".$_POST['application-abstract']."' and description = '".$_POST['application-description']."' ".
				" and related_dataset_ids = '".$_POST['related-dataset']."' and related_idea_ids = '".$_POST['related-idea']."' and related_visualization_ids = '".$_POST['related-visualization']."' and copyright = '".$_POST['right'].
				"'"); // 二重送信チェック
			$double = false;
			if(empty($result)){
				$db->executeUpdate(
					"insert into application_2013 (name, affiliation, affiliation_anonymous, is_student, email, email_anonymous, set_mailinglist, application_name, url, abstract, description, used_dataset_ids, related_dataset_ids, related_idea_ids, related_application_ids, related_visualization_ids, related_basetechnology_ids, copyright, hashed_password, timestamp, license) ".
					"values('".$_POST['name']."', '".$_POST['affiliation']."', ".$_POST['affiliation_anonymous'].", ".$_POST['is_student'].", '".$_POST['email']."', ".$_POST['email_anonymous'].", ".$_POST['set_mailinglist'].", '".
					$_POST['application-name'].
					"', '".$_POST['application-url'].
					"', '".$_POST['application-abstract']."', '".$_POST['application-description']."', '".
					$_POST['application-used-dataset']."', '".
					$_POST['related-dataset']."', '".$_POST['related-idea']."', '".$_POST['related-application']."', '".$_POST['related-visualization']."', '".$_POST['related-basetechnology']."', '".
					$_POST['right']."', '".$hash."', '".date('c')."', '".$_POST['license'].
					"')");
				$insertId = $db->getLastInsertId();

				$db->executeUpdate( // input history
					"insert into application_input_2013 (master_id, name, affiliation, affiliation_anonymous, is_student, email, email_anonymous, set_mailinglist, application_name, url, abstract, description, used_dataset_ids, related_dataset_ids, related_idea_ids, related_application_ids, related_visualization_ids, related_basetechnology_ids, copyright, timestamp, license) ".
					"values(".$insertId.", '".$_POST['name']."', '".$_POST['affiliation']."', ".$_POST['affiliation_anonymous'].", ".$_POST['is_student'].", '".$_POST['email']."', ".$_POST['email_anonymous'].", ".$_POST['set_mailinglist'].", '".
					$_POST['application-name']."', '".$_POST['application-url']."', '".$_POST['application-abstract']."', '".$_POST['application-description']."', '".$_POST['application-used-dataset']."', '".
					$_POST['related-dataset']."', '".$_POST['related-idea']."', '".$_POST['related-application']."', '".$_POST['related-visualization']."', '".$_POST['related-basetechnology']."', '".
					$_POST['right']."', '".date('c')."', '".$_POST['license'].
					"')"
					);  
				$content = MailTemplate::applicationMail($insertId, $_POST['name'], $_POST['affiliation'], ($_POST['affiliation_anonymous'] == 'true' ? true : false),
					($_POST['is_student'] == 'true' ? true : false), 
					$_POST['email'], ($_POST['email_anonymous'] == 'true' ? true : false), ($_POST['set_mailinglist'] == 'true' ? true : false),
					$_POST['application-name'], $_POST['application-url'], $_POST['application-abstract'], $_POST['application-description'], $_POST['application-used-dataset'],
					$_POST['related-dataset'], $_POST['related-idea'], $_POST['related-application'], $_POST['related-visualization'],  $_POST['related-basetechnology'],
					$_POST['right'], $password, $_POST['license']);
				$sm->send($_POST['email'], "LODチャレンジ　エントリー内容のご確認 (#a".sprintf("%03d", $insertId).")", $content);
			} else {
				$double = true;
			}
		}
	} else {
		require("apply_application_category.php");
		return;
	}
$db->closeDB();
?>

<?php echo get_header($pageTitle); ?>
<div id="contents-form">
<?php if(!$double){ ?>
<h2>登録が完了致しました</h2>

<div id="registered-message">
<div class="message">アプリケーションID： <span>a<?php echo sprintf("%03d", $insertId); ?></span></div>
<div class="message">登録情報修正用パスワード： <span><?php echo $password; ?></span></div>
<div class="message">このページを印刷して情報を保管してください。</div>
</div>
<?php }else{ ?>
<h2>二重送信です</h2>

<div id="registered-message">
<div class="message">その情報は既に登録されています。</div>
</div>
<?php } ?>
</div>
<?php echo get_footer($pageTitle); ?>