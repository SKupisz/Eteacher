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
function onLoadUserDesk(){
  var width = window.innerWidth;
  var height = window.innerHeight;
  if(height % 5 != 0)
  {
    height -= (height % 5);
  }
  height = height/5;
  if(width % 2 != 0)
  {
    width--;
  }
  width = width*0.75;
  $("#left-triangle").css("border-top",height+"px solid DarkOrange");
  $("#left-triangle").css("border-right",width+"px solid transparent");
  $("#right-triangle").css("border-top",height+"px solid DarkOrange");
  $("#right-triangle").css("border-left",width+"px solid transparent");
}
