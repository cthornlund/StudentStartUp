function validate ()
{
  var inputnamn = document.forms["registerForm"]["namn"].value;
  var inputmail = document.forms["registerForm"]["mail"].value;
  var inputlösen = document.forms["registerForm"]["lösenord"].value;
  var lösencheck = document.forms["registerForm"]["valLösen"].value;

  if (inputlösen == "" || inputlösen == null)
  {
    alert("Skriv ett lösenord!");
    return false;
  }
  if (inputmail =="" || inputmail == null)
  {
    alert("Mail är inkorrekt");
    return false;
  }
  if (inputnamn == null || inputnamn == "")
  {
    alert("Du måste fylla i ett namn!");
    return false;
  }
  if (inputlösen != lösencheck)
  {
    alert("Lösenorden matchar inte"); 
  }
}

