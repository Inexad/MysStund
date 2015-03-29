@extends('_layouts.home')
@section('content')

<div class="jumbotron">
    <div class="container">
        <div class="row">
            <h1>API Dokumentation</h1>
            <p>Dokumentationen är uppdelad i två delar, en för MysStund som kommer här samt en för Systembolaget. som kommer direkt efter.
            Är det något som inte fungerar som det skall är det bara att kontakta Polia så löser sig allt.</p>
        </div>

        <div class="row">
            <h3>MysStund</h3>
            <p>Beroende på vad som skickas som parameterar så genereras ett svar i json tillbaka med data för filmen, spriten samt ett roligt meddelande. Alla parametrar måste vara med annars kommer ett felmeddelande att förfrågan inte var korrekt.</p>

            <div class="row">
                <div class="alert alert-success" role="alert">
                    <h4> URL struktur:</h4>
                    <h5 id="urlrules">MysStund/API/hasch?price=<span class="alert-danger">pris</span>&gender=<span class="alert-danger">kön</span>&mood=<span class="alert-danger">humör</span></h5>
                </div>
            </div>

            <div class=" alert-info col-xs-6 col-md-4">
              <h4>Parameter:</h4>
              <h5>Pris</h5>
              <h5>Kön</h5>
              <h5>Humör</h5>
            </div>

            <div class="alert-info col-xs-12 col-sm-6 col-md-8">
              <h4>Förklaring:</h4>
              <h5>Detta dikterar högsta priset för spriten som skall genereras.</h5>
              <h5>Könet på användaren, valbara är: <span class="alert-warning">Man</span>, <span class="alert-warning">Kvinna</span>, <span class="alert-warning">Båda</span>, <span class="alert-warning">Annat</span> </h5>
              <h5>Humöret på användaren, valbara är: <span class="alert-warning">Glad</span>, <span class="alert-warning">Ledsen</span>, <span class="alert-warning">Kåt</span></h5>
            </div>
        </div>

        <div class="row">
          <h3>Systembolaget</h3>
          <p>Vi har en egen databas över alla droger som finns på Systembolaget från ders api. <br> Sidan för deras API finnes här:<a href="http://www.systembolaget.se/Tjanster/Oppna-APIer/">SystembolagetAPI</a>  Svaren ges som json tillbaka</p>

          <div class="row">
            <div class="alert alert-success" role="alert">
              <h4> URL struktur:</h4>
              <h5 id="urlrules2">MysStund/systembolaget/search?s=<span class="alert-danger">söksträng</span></h5>
            </div>
          </div>
        </div>
    </div>
  </div>

<style>
#urlrules {
    left:12px;
}
</style>
