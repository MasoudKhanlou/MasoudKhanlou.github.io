<?php
$data = file_get_contents("https://jsonplaceholder.typicode.com/posts/1");
echo '<pre>';
print_r($data);
echo '</pre>';

if (isset($_SERVER['HTTP_USER_AGENT'])) {
  $cd = $_SERVER['HTTP_USER_AGENT'];
  var_dump($cd);
}
echo '</br>';
$userIp = $_SERVER['REMOTE_ADDR'];
echo $userIp;
?>

<head>
</head>

<body>
  <button class="btnGoTo">go to</button>
  <section class="secUp">
    <img  class="img1" src="/Pictures/404-page.jpg" alt="">
  </section>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  <pre>
  <section class="mySection">
    <img src="/Pictures/1.png" alt="">
  </section>

  </pre>
  <button class="btnDown">go up</button>
  <script>
    let scroll = document.querySelector('.mySection');
    let btn = document.querySelector('.btnGoTo');
    let btnDown = document.querySelector('.btnDown');
    let sec = document.querySelector('.secUp');
    let ju = document.querySelector('.img1');
  
setTimeout(() => {
  ju.addEventListener('click',function(){
    alert('Pantea lets date');
  ju.removeEventListner();
  });
}, 3000);

    btn.addEventListener('click', function() {
      scroll.scrollIntoView({
        behavior: 'smooth'
      });
    });
    btnDown.addEventListener('click', function() {
      sec.scrollIntoView({
        behavior: 'smooth'
      });
    });
    
  
  </script>
</body>


clientID = 839605005922-vdhrun5qf4bmidq4grrld6op8rl3rkdt.apps.googleusercontent.com
clientSecret = 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
redirectURL = http://localhost/products.php