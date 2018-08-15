<style>
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

  <div class="tab">

    {!! Form::radio('tipo-pagamento',null, null, ['onclick' => 'openCity(event, "cred-card")']) !!}
    {!! Form::radio('tipo-pagamento', null, null,['onclick' => 'openCity(event, "boleto")']) !!}

    <!--   <input type = "radio" name="" onclick="openCity(event, 'cred-card')">Cartão de crédito</button> -->
    <!-- <input type = "radio" name="tipo-pagamento" onclick="openCity(event, 'boleto')">Boleto</button> -->
  </div>

  <div id="cred-card" class="tabcontent">
    <h3>London</h3>
    <p>London is the capital city of England.</p>
  </div>

  <div id="boleto" class="tabcontent">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p> 
  </div>

  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
  <br>


