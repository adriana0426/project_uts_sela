document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll("form[data-validate]").forEach(function(form){
    form.addEventListener("submit", function(e){
      var valid = true; var msgs = [];
      form.querySelectorAll("[data-required]").forEach(function(inp){
        if(!inp.value || inp.value.trim()===""){ valid=false; msgs.push((inp.getAttribute("data-label")||inp.name)+" harus diisi."); }
      });
      form.querySelectorAll("[data-numeric]").forEach(function(inp){
        var v = inp.value.trim();
        if(v !== "" && isNaN(v)){ valid=false; msgs.push((inp.getAttribute("data-label")||inp.name)+" harus angka."); }
      });
      if(!valid){ e.preventDefault(); alert(msgs.join("\n")); }
    });
  });
});
