<?php
$name= 'Pantea';

$url ="https://reqres.in/api/users";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.postbank.com/');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);

?>
<html>
<head></head>
<body>
  <script>
    var name="<?php echo $name;?>"
    alert('Hi '+name);

  </script>
</body>
</html>