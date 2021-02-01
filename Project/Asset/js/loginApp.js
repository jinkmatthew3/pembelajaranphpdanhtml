API_KEY = "8c54e9e9366789a5d38c369b9294f913"

/*Login Module------------------------------------
-------------------------------------------------*/
let appLogin = angular.module('login', [])

appLogin.controller('LoginController', function($scope, $window, loginServices) {
	$scope.username = ''
	$scope.password = ''
	$scope.isError = false;

	let username = ''

	////////////////////////

	angular.element(document).ready(function() {
		username = loginServices.getCookie("username")

		if(username != '') {
			$window.location.href = "/data.html"
		}
	})
	
	////////////////////////

	//Submit Form Login---------------------------------------------
	$scope.submitLogin = function(username, password) {
		if(username == '' || password == '') {
			alert("Ga boleh kosong")
		}

		else {
			//XML HTTP REQUEST------------------------------
			loginServices.getUsers()
				.then(function(response) {
					if(loginServices.isAuthUser(response, username, password)) {
						loginServices.loginSuccess($scope, $window, username)
					}

					else {
						loginServices.loginFailed($scope)
					}
				})
			//END OF XML HTTP REQUEST-----------------------------------
		}
	}
	//END OF Submit Form Login---------------------------------------------
})


appLogin.factory('loginServices', function($http) {
	var req = ''
	var user = ''

	var d = ''
	var expires = ''
	var name = ''
	var ca = []
	var c = ''

	var service = {
		loginSuccess: loginSuccess,
		loginFailed: loginFailed,
		
		getUsers: getUsers,
		isAuthUser: isAuthUser,
		setCookie: setCookie,
		getCookie: getCookie
	}

	return service;

	////////////////////////

	function loginSuccess($scope, $window, username) {
		setCookie("username", username, 1)

		$scope.username = ''
		$scope.password = ''
		document.getElementById("form").reset()

		$window.location.href = '/home.html'
	}

	function loginFailed($scope) {
		$scope.username = ''
		$scope.password = ''
		$scope.isError = true;
		document.getElementById("form").reset()
	}

	function getUsers() {
		return $http.get("Data/users.json")
			.then(getUsersSuccess)
			.catch(getUsersFailed)

		function getUsersSuccess(response) {
			return response
		}

		function getUsersFailed(error) {
			console.log(error)
			alert("Error " + error.status + " \nURL " + error.statusText)
		}
	}

	function isAuthUser(response, username, password) {
		req = response

		//Cek Inputan form dengan db users--------------------
		for(var i = 0; i < req.data.users.length; i++) {
			user = req.data.users[i]

			if((username == user.username) && (password == user.password)) {
				return true
			}
		}

		return false
		//END OF Cek Inputan form dengan db users--------------------
	}

	function setCookie(cname, cvalue, cexdays) {
		d = new Date()
		d.setTime(d.getTime() + (cexdays * 24 * 60 * 60 * 1000))
		
		expires = "expires=" + d.toUTCString();

		console.log(expires)
		
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
	}

	function getCookie(cname) {
        name = cname + "="; 
        ca = document.cookie.split(';');

        for(var i = 0; i < ca.length; i++) {
            c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }

            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }

        return "";
    }
})
/*END OF Login Module------------------------------
-------------------------------------------------*/