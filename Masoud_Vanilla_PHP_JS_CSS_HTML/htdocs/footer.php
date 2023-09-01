<footer class="footer">
   <div class="footer-container">
      <ul class="link-footer">
         <li style="margin-right: 2.5rem">
            Copyright&copy; 2023-X. All rights reserved.
         </li>
         <li><a href="impressum.php">Impressum</a></li>
         <li><a href="datenschutz.php">Datenschutz</a></li>
         <li><a href="aboutus.php">Über X</a></li>
         <li><a href="support.php">FAQ</a></li>
      </ul>
      <div class="footer-social-media">
         <ul class="link-footer">
            <li>
               <a href="https://www.youtube.com">
                  <ion-icon name="logo-youtube"></ion-icon>
               </a>
            </li>
            <li>
               <a href="https://www.instagram.com">
                  <ion-icon name="logo-instagram"></ion-icon>
               </a>
            </li>
            <li>
               <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                  </ion-icon>
               </a>
            </li>
         </ul>
      </div>
   </div>
</footer>
<style>
   /*Footer*/
   .footer-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 10rem;
      background-color: #343434;
      color: #d6d6d6;
      font-weight: 30;
      font-size: 1.2rem;
   }

   .link-footer {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      list-style: none;
      font-size: 1.2rem;
      letter-spacing: 0.5px;
   }

   .footer-social-media {
      display: flex;
      flex-direction: row;
      margin-top: 2rem;
   }

   /*Attribute to manipulate icons*/
   ion-icon {
      font-size: 3rem;
   }

   /*Attribute to disable tooltips of icons*/
   ion-icon:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
   }
</style>