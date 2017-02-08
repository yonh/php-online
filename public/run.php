<?php
require_once __DIR__ . "/functions.php";

if (!isset($_POST['code']) || empty($_POST['code'])) {
	$result = array('status'=>'failed', 'result'=>'please give me code!');
	echo json_encode($result);
}

$code = $_POST['code'];

$code_file = "/tmp/code.php";
$stdout_file = "/tmp/stdout.log";
$stderr_file = "/tmp/stderr.log";

file_put_contents($code_file, $code);

if ($code) {
	$result = array('status'=>'success');
	system("bash /opt/run_code.sh", $status_code);

	if ($status_code === 0) {
		$result['result'] = @file_get_contents($stdout_file);

	} else {
		$result['result'] = @file_get_contents($stderr_file);
	}

	echo json_encode($result);
}

@unlink($code_file);
@unlink($stdout_file);
@unlink($stderr_file);