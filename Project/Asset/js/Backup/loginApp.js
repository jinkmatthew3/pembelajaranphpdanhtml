API_KEY = "8c54e9e9366789a5d38c369b9294f913"

/*Login Module------------------------------------
-------------------------------------------------*/
let appLogin = angular.module('login', [])

appLogin.controller('loginCtrl', function($scope, $window, loginServices) {
	$scope.username = ''
	$scope.password = ''
	$scope.isError = false;

	angular.element(document).ready(function() {
		let username = loginServices.getCookie("username")

		if(username != '') {
			$window.location.href = "/data.html"
		}
    })

	//Submit Form Login---------------------------------------------
	$scope.submitLogin = function(username, password) {
		if(username == '' || password == '') {
			alert("Ga boleh kosong")
		}

		else {
			//XML HTTP REQUEST------------------------------
			loginServices.getUsers().then(
				function successCallback(response) {
					if(loginServices.isAuthUser(response, username, password)) {
						alert("Berhasil Login")
						loginServices.setCookie("username", username, 1)

						$scope.username = ''
						$scope.password = ''
						document.getElementById("form").reset()

						$window.location.href = '/data.html'
					}

					else {
						alert("Tidak Berhasil Login")

						$scope.username = ''
						$scope.password = ''
						$scope.isError = true;
						document.getElementById("form").reset()
					}
				},

				function errorCallback(response) {
					console.log(response)
					alert("Error " + response.status + " \nURL " + response.statusText)
				},
			)
			//END OF XML HTTP REQUEST-----------------------------------
		}
	}
	//END OF Submit Form Login---------------------------------------------
})


appLogin.factory('loginServices', function($http, $window) {
	let getUsers = function() {
		return $http.get("Data/users.json")
	}

	let isAuthUser = function(response, username, password) {
		let req = response

		//Cek Inputan form dengan db users--------------------
		let user
		for(var i = 0; i < req.data.users.length; i++) {
			user = req.data.users[i]

			if((username == user.username) && (password == user.password)) {
				return true
			}
		}

		return false
		//END OF Cek Inputan form dengan db users--------------------
	}

	let setCookie = function(cname, cvalue, cexdays) {
		var d = new Date()
		d.setTime(d.getTime() + (cexdays * 24 * 60 * 60 * 1000))
		
		var expires = "expires=" + d.toUTCString();

		console.log(expires)
		
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
	}

	let getCookie = function(cname) {
        var name = cname + "="; 
        var ca = document.cookie.split(';');

        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }

            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }

        return "";
    }

	return {
		getUsers: getUsers,
		isAuthUser: isAuthUser,
		setCookie: setCookie,
		getCookie: getCookie
	}
})
/*END OF Login Module------------------------------
-------------------------------------------------*/