function requisicao(){

      var xml = new XMLHttpRequest();
    
      xml.open("GET","http://oraculodudu.atwebpages.com/usuarios.php",true);
    
      xml.onreadystatechange = atualiza_dados;
    
      xml.send();

}


function atualiza_dados(){

   if (this.readyState==4){
      
      let response = this.response;
      
      
      novatable = document.createElement("div");
      
      novatable.className = "usuarios";
      
      novatable.innerHTML = response;
      
      novatable = novatable.getElementsByClassName("usuarios")[0].innerHTML;
      
      
      document.getElementsByClassName("usuarios")[0].innerHTML = novatable;
      
      setTimeout(requisicao,5000);
      
 
      
      
      
   
   }

}


requisicao();
  


