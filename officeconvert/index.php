<?php

$tmpdir = "./work/";
$extslist = "xls/xlsx/doc/docx/ppt/pptx/txt/png/jpg/gif/jpeg";

function	my_ini_get($key)
{
	return $key.":".ini_get($key);
}


if ((get_magic_quotes_runtime()))
	set_magic_quotes_runtime(0);

$defaulturl = "https://";
$url = null;
$name = null;

$id = implode("_", split('[^0-9]+', @$_SERVER["REMOTE_ADDR"]." ".@$_SERVER["REMOTE_PORT"]));

if (strlen($url = @$_REQUEST["u0"]) > strlen($defaulturl)) {
	if ((ereg('^https?://', $url)))
		;
	else if ((ereg('^ftps?://', $url)))
		;
	else
		die("protocol not supported.");
	$fn0 = null;
	$name = $url;
} else if (($fn0 = @$_FILES["f0"]["tmp_name"]) !== null) {
	$url = null;
	$name = @$_FILES["f0"]["name"];
} else {
	$s = my_ini_get("post_max_size")." ".my_ini_get("upload_max_filesize");
	print <<<EOO
<HTML><HEAD><TITLE>officeconvert</TITLE></HEAD><BODY>
<H1>officeconvert</H1>

<FORM method=POST enctype="multipart/form-data">
<UL>
	<LI>from URL: <INPUT type=text name=u0 size=60 value="{$defaulturl}">
	<LI>from file: ({$s}) <INPUT type=file name=f0>
	<LI>convert-to: <SELECT name=t0>
<OPTION value=pdf selected>* -&gt; .pdf</OPTION>
<OPTION value=txt>doc -&gt; .txt</OPTION>
<OPTION value=csv>* -&gt; .csv</OPTION>
<OPTION value=tsv>* -&gt; .tsv</OPTION>
	</SELECT>
	<LI><INPUT type=submit>
</UL>
</FORM>

<HR>
</BODY></HTML>

EOO;
	die();
}

$exts = null;
foreach (explode("/", $extslist) as $val)
	if (eregi('\.'.$val.'$', $name)) {
		$exts = $val;
		break;
	}

$infilter = null;
$extdsub = "";
$id=time();
$extd='pdf';
$fns = "{$tmpdir}/{$id}.{$exts}";
$fnd = "{$tmpdir}/{$id}.{$extd}";
$fn0 = null;
if ($fn0 === null) {
	$s = file_get_contents($url) or die("file_get_contents failed.");
	file_put_contents($fns, $s);
} else {
	if (!move_uploaded_file($fn0, $fns))
         die("move_uploaded_file failed.");
}

$s = `env HOME=/tmp LANG=en_US.UTF-8 libreoffice --headless --convert-to {$extd}{$extdsub} --outdir {$tmpdir} {$infilter} {$fns}`;
@unlink($fns);
if (!is_readable($fnd)) {
	die("soffice error.<BR>".nl2br(htmlspecialchars($s)));
	
}

if ($extd == "file")
	header("Content-Type:application/octet-stream");
else
	header("Content-Type:application/pdf ");
header('Content-Disposition: inline; filename="hsconvert.'.$extd.'"');
readfile($fnd);
@unlink($fnd);

?>
