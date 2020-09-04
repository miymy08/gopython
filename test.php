<html> 
<head> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script> 
<script src="http://www.skulpt.org/js/skulpt.min.js" type="text/javascript"></script> 
<script src="http://www.skulpt.org/js/skulpt-stdlib.js" type="text/javascript"></script> 

</head> 

<body> 
<?php
  $i = 1;
  while($i < 6){
?>

<script type="text/javascript"> 
function outf<?php echo $i?>(text) { 
    var mypre = document.getElementById("output<?php echo $i?>"); 
    mypre.innerHTML = mypre.innerHTML + text; 
} 
function builtinRead<?php echo $i?>(x) {
    if (Sk.builtinFiles === undefined || Sk.builtinFiles["files"][x] === undefined)
            throw "File not found: '" + x + "'";
    return Sk.builtinFiles["files"][x];
}
function runit<?php echo $i?>() { 
   var prog = document.getElementById("yourcode<?php echo $i?>").value; 
   var mypre = document.getElementById("output<?php echo $i?>"); 
   mypre.innerHTML = ''; 
   Sk.pre = "output<?php echo $i?>";
   Sk.configure({output:outf<?php echo $i?>, read:builtinRead<?php echo $i?>}); 
   var myPromise = Sk.misceval.asyncToPromise(function() {
       return Sk.importMainWithBody("<stdin>", false, prog, true);
   });
} 
</script> 


<h3>Try This</h3> 
<form> 
<textarea id="yourcode<?php echo $i?>" cols="40" rows="10">print "Hello World<?php echo $i?>" 
</textarea><br /> 
<button type="button" onclick="runit<?php echo $i?>()">Run</button> 
</form> 
<pre id="output<?php echo $i?>" ></pre> 

  
<?php
    $i++;
  }
?>

</body> 

</html>