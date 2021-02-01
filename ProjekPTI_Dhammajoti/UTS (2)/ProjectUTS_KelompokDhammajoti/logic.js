function onDocumentFinish(){
	cek1=0;
	cek2=0;
	age=0;
	cektf=0;
	cekdate=0;
document.getElementById('formSubmit').onsubmit = function(form){
				form.preventDefault();
							
				let item={
					name: '',
					date:'',
					isItemValid:function(){
						cek=0;
						if (this.name!==''&&this.date!==''){
							var minAge = 17;
				        	function _calcAge() {
					            var date = new Date(document.getElementById("date").value);
					            var today = new Date();

					            var timeDiff = Math.abs(today.getTime() - date.getTime());
					            var age1 = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;
					            return age1;
				       		 }
				      		// function _setAge() {
					            var age = _calcAge();
					            // alert("my age is " + age); // alert buat tau umurnya
					            if (age < minAge) {
					                cektf=0;
					                cekdate=0;
					                // alert kalo umur tidak mencukupi
					                Swal.fire("You are too young!");

					            } else{
					            	// buat nanti di cek 
					            	cektf=1;
					            	cekdate=1;
					            }
		
					        if(cektf==1){   	
					        	window.localStorage.setItem('uname',this.name);
					        	// alert(window.localStorage.getItem('uname'));
					        	return true;
					        }
					        else
					        {
					        	return false;
					        }
							
							
						}
						else{
							if (this.name!==''&&this.date=='') {
								cek1=1;
								// return false;
							}
							else if (this.name==''&&this.date!=='') {
								cek2=1;
								// return false;
							}
							else if(this.name==''&&this.date==''){
								cek1=1;
								cek2=1;

							}
							return false;
						}
					},
					fillProperty: function(dataSource){
						item.name =dataSource.target['nama'].value;
						item.date=dataSource.target['date'].value;
						// console.log(this.name,'a lv.',this.number,'is required');
					}
				}
				item.fillProperty(form);
				if (item.isItemValid()) {	
								// Swal.fire({
		  				// 		position: 'top-center',
		  				// 		type: 'success',
		  				// 		title: '',
		 					// 	showConfirmButton: true,
		  				// 		timer: 1000
								// })				
					window.location.href="game2.html";
					
				}
				else{
					if(cek1==1&&cek2==1){
						Swal.fire('All fields must not empty')
						cek1=0;
						cek2=0;
					}
					else if (cek1==1) {
						Swal.fire('Please Input Birthdate')
						cek1=0
					}
					else if(cek2==1){
						Swal.fire('Please Input a Name')
						cek2=0
					}
					
				}

				function kirimUname(){
					var uname = this.name;
					window.localStorage.setItem("uname",uname);
				}
			}
}



