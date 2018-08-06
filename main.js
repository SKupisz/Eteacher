function onLoadWebSite(){
  var width = window.innerWidth;
  var height = window.innerHeight;
  if(height % 5 != 0)
  {
    height -= (height % 5);
  }
  height = height/5;
  width-=16;
    $("#triangle").css("border-top",height+"px solid DarkOrange");
  $("#triangle").css("border-right",width+"px solid transparent");
}
