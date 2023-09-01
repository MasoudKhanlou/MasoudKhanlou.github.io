<!--Coockie-->
<div class="Coockie-consent-modal">
   <div class="coockie-content">
      <h1 style="margin-bottom: 3rem; text-align: center">
         Kurz zu den Coockies, dann gehts weiter
      </h1>
      <div class="coockie-scroll">
         <p>
            Wir verwenden Cookies und Daten, um</br>
            &#x2022; KEMA-Dienste anzubieten und zu betreiben</br>
            &#x2022; Ausfälle zu prüfen und Maßnahmen gegen Spam, Betrug und Missbrauch zu ergreifen</br>
            &#x2022; Daten zu Zielgruppeninteraktionen und Websitestatistiken zu erheben.</br>
            Mit den gewonnenen Informationen möchten wir verstehen, wie unsere Dienste verwendet werden, und die
            Qualität
            dieser Dienste verbessern.</br>
            Wenn Sie „Alle Cookies erlauben“ auswählen, verwenden wir Cookies und Daten auch, um</br>
            &#x2022; neue Dienste zu entwickeln und zu verbessern</br>
            &#x2022; Werbung auszuliefern und ihre Wirkung zu messen</br>
            &#x2022; personalisierte Inhalte anzuzeigen, abhängig von Ihren Einstellungen</br>
            &#x2022; personalisierte Werbung anzuzeigen, abhängig von Ihren Einstellungen.</br>
            Wenn Sie „Nur technisch Notwendige“ auswählen, verwenden wir nur technisch notwendige Cookies,
            die für die Ausführung technischer Dienste unserer Web-Seite und deren Betrieb notwendig sind,
            und nicht für die zusätzlichen Zwecke.</br>
            Nicht personalisierte Inhalte werden u. a. von Inhalten, die Sie sich gerade ansehen, Aktivitäten in Ihrer
            aktiven Suchsitzung und Ihrem Standort beeinflusst. Nicht personalisierte Werbung wird von den Inhalten, die
            Sie
            sich gerade
            ansehen, und Ihrem allgemeinen Standort beeinflusst. Personalisierte Inhalte und Werbung können auch
            relevantere
            Ergebnisse, Empfehlungen und individuelle Werbung enthalten, die auf früheren Aktivitäten in diesem Browser,
            etwa Suchanfragen bei Google, beruhen. Sofern relevant, verwenden wir Cookies und Daten außerdem,
            um Inhalte und Werbung altersgerecht zu gestalten.
         </p>
      </div>
      <div class="coockie-btn">
         <button class="coockie-btn-technical" onclick="acceptTechnicalCoockie();">
            Nur technisch Notwendige
         </button>
         <button class="coockie-btn-accept" onclick="acceptCookie();">Alle Cookies erlauben</button>
      </div>
   </div>
</div>
<style>
   /*Coockie*/
   .Coockie-consent-modal {
      width: 100%;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 999;
      display: none;
      align-items: center;
      justify-content: center;
   }

   .Coockie-consent-modal.coockie-actieve {
      display: flex;
      flex-direction: column;
   }

   .coockie-content {
      width: 60%;
      height: auto;
      background-color: #fff;
      color: #505050;
      font-size: 1rem;
      padding: 3rem;
      border-radius: 1rem;
      text-align: justify;
   }

   .coockie-scroll {
      padding-left: 2rem;
      padding-right: 2rem;
      overflow: hidden;
      overflow-y: scroll;
   }

   .coockie-content p {
      line-height: 2.3;
      height: 20rem;
   }

   .coockie-btn {
      display: flex;
      justify-content: flex-end;
      gap: 1.2rem;
      margin-top: 3rem;
   }

   .coockie-btn-technical {
      width: 20rem;
      height: 3.5rem;
      color: #f5f5f5;
      background-color: #3385ff;
      border: none;
      border-radius: 5rem;
      cursor: pointer;
   }

   .coockie-btn-accept {
      margin-right: 2rem;
      width: 20rem;
      height: 3.5rem;
      color: #f5f5f5;
      background-color: #3385ff;
      border: none;
      border-radius: 5rem;
      cursor: pointer;
   }

   .coockie-btn-accept:hover {
      background-color: #1b82e6;
   }

   .coockie-btn-technical:hover {
      background-color: #1b82e6;
   }
</style>