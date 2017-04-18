<?php
require_once __DIR__ . "/functions.php";

if (!isset($_POST['code']) || empty($_POST['code'])) {
	$result = array('status'=>'failed', 'result'=>'please give me code!');
	echo json_encode($result);
}

$code = $_POST['code'];

$tmp_code_dir = "/tmp/code";
$code_file = "/tmp/code.php";
$stdout_file = "/tmp/stdout.log";
$stderr_file = "/tmp/stderr.log";
$index_file = "/tmp/code_index";

file_put_contents($code_file, $code);

if ($code) {
	$result = array('status'=>'success');
	system("bash /opt/run_code.sh", $status_code);

	if ($status_code === 0) {
		$result['result'] = base64_encode(htmlentities(@file_get_contents($stdout_file)));
	} else {
		$result['result'] = base64_encode(htmlentities(@file_get_contents($stderr_file)));
		$result['status'] = 'failed';
	}
	echo json_encode($result);
}

// 保存临时代码
$index = intval(trim(file_get_contents($index_file)));
$index++;
if ($index>99) $index = 0;

if (!file_exists($tmp_code_dir)) mkdir($tmp_code_dir);
copy($code_file, $tmp_code_dir . "/" . $index . ".php");
file_put_contents($index_file, $index);


@unlink($code_file);
@unlink($stdout_file);
@unlink($stderr_file);
