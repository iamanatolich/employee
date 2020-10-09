function openWin2(my_link) {
    var alink = my_link.href;
    var patt1=/datain=(.*)/i;
    var patt2=/dataout=(.*)/i;
    var PO=alink.match(patt1)[1];
    var PO1=PO.substring(0,10);
    var PO2=alink.match(patt2)[1];
    /*
    var PO=alink.match(patt1)[1];
    var PO1=PO.substring(0,10);
    var PO2=alink.match(patt2)[1];
    var PO3=PO2.substring(0,10);
    var PO4=alink.match(patt3)[1];
    var PO5=PO3.substring(0,10);
    */

    var href = "/vacation/add/?datain="+PO1+"&dataout="+PO2;
    //var href = "/users/edit";
    //  myWin = window.open(href, "", "width=1000,height=1000,location=no,status=no,menubar=no,toolbar=no,scrollbars=no,resizable=no,left=400, top=300");
    //myWin.resizeTo(1000,1000);
    //myWin.moveTo(1000,1000);
    myWin = open(href, "displayWindow");
}
