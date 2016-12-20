function saveDoc(){
   // alert($resumeName);
  if (!window.Blob) {
      alert('Your legacy browser does not support this action.');
      return;
   }

   var html, link, blob, url, css;
   
   // EU A4 use: size: 841.95pt 595.35pt;
   // US Letter use: size:11.0in 8.5in;
   
   css = ('<style>'+$("#docresume_css").html()+'</style>');
   //alert(css);
   
   html = '<div class=" doc-resume" id="resume-viewer">'+$(".doc-resume").html()+'</div>';
   blob = new Blob(['\ufeff', css + html], {
     type: 'application/msword'
   });
   url = URL.createObjectURL(blob);
   link = document.createElement('A');
   link.href = url;
   // Set default file name. 
   // Word will append file extension - do not add an extension here.
   link.download = $resumeName;   
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, $resumeName); // IE10-11
   		else link.click();  // other browsers
   document.body.removeChild(link);
}