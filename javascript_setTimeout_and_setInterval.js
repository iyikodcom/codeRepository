//=========================================================================================
//1-Javascript setTimeout kullanım örneği;
//--birkere çalışır
setTimeout(function(){
  
  console.log('Hello World!');
  
}, 1000);//-->1000 milisaniye sonrasında fonksiyonu çalıştırır
//=========================================================================================
//2-Javascript setInterval kullanım örneği;
//--tekrar ve tekrar çalışır
setInterval(function(){
  
  console.log("Hello World!"); 

}, 3000);//-->3000 milisaniye de bir tekrar fonksiyonu çalıştırır
//=========================================================================================
//3-Javascript setInterval'ın durdurlması örneği;
//--<button onclick="myStopFunction()">Stop time</button>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  var t = d.toLocaleTimeString();
  console.log(t);
}

function myStopFunction() {
  clearInterval(myVar);
}
//=========================================================================================
