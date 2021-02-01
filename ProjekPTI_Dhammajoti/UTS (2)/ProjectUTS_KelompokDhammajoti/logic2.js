let suhu;
var username;
let healthM;
let healthP;
let History;
let flag =0;
	healthM = document.getElementById("healthmonster")
	healthP = document.getElementById("healthplayer")
	history= document.getElementById("history")
function game2(){
	 var key = "f6f07d6374cde0d0ad338af66688cf05";
	var city = "Serpong"; 
	var url = "https://api.openweathermap.org/data/2.5/forecast";
	var xhttp = new XMLHttpRequest();
	 	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
	     		console.log(this.responseText);
	     		let data = JSON.parse(this.responseText);
	    		suhu = data.main.temp;
	     		console.log(data);
	     		console.log("suhu :"+suhu);
	   		 }
	 	};
	var url2 = "http://api.openweathermap.org/data/2.5/weather?q=serpong&units=metric&appid=f6f07d6374cde0d0ad338af66688cf05";
	xhttp.open("GET", url2, true);
	xhttp.send();
	//buat test kalo tidak ada koneksi internet
	// suhu =29;
	username=window.localStorage.getItem('uname'); // ambil data dari local storage
	// console.log(username);
	// alert(username);
	document.getElementById('username').innerHTML="<p id'texttengah' style='float: center; text-align: center' ><strong>"+username+"</strong></p>";
	healthM = document.getElementById("healthmonster")
	healthP = document.getElementById("healthplayer")
	history= document.getElementById("history")


}
function myFunction() {
  	var x = document.getElementById("btnstart");
  	var btnatck = document.getElementById("btnatck");
 	if (x.style.display === "none") {
    	x.style.display = "block";
    	btnatck.style.display="none";
 	} 
 	else {
    	x.style.display = "none";
   		btnatck.style.display="block";
  	}
}

function hisBarP(x){
	var hst=document.getElementById('history');
	let elmnt = document.createElement('div');
	const divClass = document.createAttribute('class')
	divClass.value='daftar'
	elmnt.setAttributeNode(divClass)
	document.getElementById("history").classList.add("daftar")
	let isi=document.createElement('div')
	const  kelas = document.createAttribute('class')
	kelas.value='dtr'
	isi.setAttributeNode(kelas)
	let value = username+" Hits Monster Hard For " + x;	
	// console.log(value);
	isi.appendChild(document.createTextNode(value))
	hst.insertBefore(isi,hst.firstChild)
}
function hisBarM(y){
	var hst=document.getElementById('history');
	let elmnt2 = document.createElement('div');	
	const divClass2 = document.createAttribute('style')
	divClass2.value = 'color:blue;'
	elmnt2.setAttributeNode(divClass2)
	document.getElementById("history").classList.add("daftar2")
	let isi2 = document.createElement('div')
	const  kelas2 = document.createAttribute('class')
	kelas2.value='dtr2'
	isi2.setAttributeNode(kelas2)
	let value2 = "Monster Hits "+ username+ " Hard For " + y;	
	// console.log(value2);
	isi2.appendChild(document.createTextNode(value2))
	hst.insertBefore(isi2,hst.firstChild)
}
function winalert(){
	if (healthM.value<=0) {
		var r = window.confirm("You won! New Fight?")
		if (r == false) {
			window.location.reload()
			healthP.value = 100;
			healthM.value = 100;
			lop=3;
		} 
		else if (r == true){
			var hapus =document.getElementById('history')
			while (hapus.firstChild) {
			    hapus.removeChild(hapus.firstChild); //hapus history
			}
			healthP.value = 100;
			healthM.value = 100;
			lop=3;
			var btnatck = document.getElementById("btnatck");

		}
	}	
	else if (healthP.value<=0) {
			var r=window.confirm("You Lost! New Fight?")
			if (r == false) {
				window.location.reload()
				healthP.value = 100;
				healthM.value = 100;
				lop=3;
			} else if (r == true) 	{
				var hapus =document.getElementById('history')
				while (hapus.firstChild) {
				    hapus.removeChild(hapus.firstChild); //hapus history
				}	
				healthP.value = 100;
				healthM.value = 100;
				lop=3; //set loop supaya button click bisa di pake 3 kali lagi
				var btnatck = document.getElementById("btnatck");
			}
		}
}

function buttonattack(){
	flag=1;
	healthM = document.getElementById("healthmonster")
	healthP = document.getElementById("healthplayer")
	history= document.getElementById("history")
		if (suhu>30) {
			//ngurangin HP Player
			var x = Math.floor((Math.random() * 12) + 5);
			console.log(x,"1");
			healthM.value -= x;
			//nggurangin HP monster
			var y = Math.floor((Math.random() * 10) + 3	);
			// console.log(y);
			healthP.value -= y
			// console.log(healthP);
		}
		else if (suhu>=28&&suhu<=30) {
			//ngurangin HP Player
			var x = Math.floor((Math.random() * 10) + 3);
			console.log(x,"2");
			healthM.value -= x
			// console.log(healthM);
			//nggurangin HP monster
			var y = Math.floor((Math.random() * 10) + 3);
			// console.log(y);
			healthP.value -= y
			// console.log(healthP);
		}
		else if (suhu<28) {
			//ngurangin HP Player
			var x = Math.floor((Math.random() * 8) + 1);
			console.log(x,"3");
			healthM.value -= x 
			// console.log(healthM);
			//nggurangin HP monster
			var y = Math.floor((Math.random() * 10) + 3);
			// console.log(y);
			healthP.value -= y
			// console.log(healthP);	
		}
		//buat nampilin History
		hisBarP(x);
		hisBarM(y);
		//buat munculin alert menang kalah
		winalert();
}


let lop=3;//jumlah special button bisa di pakai
function buttonspecial(){
	flag=1;
	if (lop>=1){
	//ngurangin HP Player
	var x = Math.floor((Math.random() * 20) + 10);
	console.log(x,"3");
	healthM = document.getElementById("healthmonster")
	healthM.value -= x
	// console.log(healthM);
	//nggurangin HP monster
	var y = Math.floor((Math.random() * 10) + 3);
	// console.log(y);
	healthP = document.getElementById("healthplayer")
	healthP.value -= y
	// console.log(healthP);
	lop -= 1;

	//manggil function buat nampilin history
	hisBarP(x); 
	hisBarM(y);
	//buat munculin alert menang kalah
	winalert()	
	}
	else{
		Swal.fire("You Have Used All Your Special Attack");
	}
}
function buttongiveup(){
	healthM = document.getElementById("healthplayer")
	healthM.value -=100; //set darah jadi 0 karena kalah
	alert("You Lost");
	window.location.reload()
	healthP.value = 100; //set ulang darah jadi 100 untuk memulai kembali
	healthM.value = 100; //set ulang darah jadi 100 untuk memulai kembali
}
var temphealthM; // buat save load
var temphealthP; // buat save load
var tempuname; // buat save load
function buttonsave(){
	// console.log("masuk save")

	if (flag==0) {
		healthM.value=100;
		healthP.value=100;
		localStorage.setItem('healthPlayer',healthP.value);
	localStorage.setItem('healthMonster',healthM.value);

	temphealthP=window.localStorage.getItem('healthPlayer');
	temphealthM=window.localStorage.getItem('healthMonster'); // ambil data dari local storage
	 // remove localStorage
	 localStorage.removeItem('healthPlayer');
	 localStorage.removeItem('healthMonster');

	}else{
		// console.log(healthP); 
	localStorage.setItem('healthPlayer',healthP.value);
	localStorage.setItem('healthMonster',healthM.value);

	temphealthP=window.localStorage.getItem('healthPlayer');
	temphealthM=window.localStorage.getItem('healthMonster'); // ambil data dari local storage
	 // remove localStorage
	 localStorage.removeItem('healthPlayer');
	 localStorage.removeItem('healthMonster');
	}

	
}
function buttonload(){	
		if (flag==0) {
			temphealthP=100;
			temphealthM=100;
			healthP.value= temphealthP;
			healthM.value= temphealthM;
		}
		else{
		// console.log("masuk load")
		healthP.value= temphealthP;
		healthM.value= temphealthM;
		}
		
}



