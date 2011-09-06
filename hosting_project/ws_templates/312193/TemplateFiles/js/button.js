selected=0;
a_naviover = new Array;
  a_naviover[1] = new Image;a_naviover[1].src = "styles/topbox/latestnewsh.jpg";
  a_naviover[2] = new Image;a_naviover[2].src = "styles/topbox/latestwarsh.jpg";
  a_naviover[3] = new Image;a_naviover[3].src = "styles/topbox/latestpostsh.jpg";
  a_naviover[4] = new Image;a_naviover[4].src = "styles/topbox/latesuserh.jpg";
  
a_naviout = new Array;
  a_naviout[1] = new Image;a_naviout[1].src = "styles/topbox/latestnews.jpg";
  a_naviout[2] = new Image;a_naviout[2].src = "styles/topbox/latestwars.jpg";
  a_naviout[3] = new Image;a_naviout[3].src = "styles/topbox/latestposts.jpg";
  a_naviout[4] = new Image;a_naviout[4].src = "styles/topbox/latesuser.jpg";
  
function naviover(nr) {
    if(selected!=0) {
    imgname="sc"+selected;
    document.images[imgname].src=a_naviout[selected].src;
}
    selected=nr;
    imgname="sc"+nr;
    document.images[imgname].src=a_naviover[nr].src;
}

function naviout(nr) {
    if(nr!=selected) {
    imgname="sc"+nr;
    document.images[imgname].src=a_naviout[nr].src;
}
}