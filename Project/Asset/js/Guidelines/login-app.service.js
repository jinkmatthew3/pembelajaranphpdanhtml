(function(angular) {
    'use strict'

    API_KEY = "8c54e9e9366789a5d38c369b9294f913"
    
    ////////////

    angular
        .module('login')
        .factory('loginService', loginService)

    loginService.$inject = ['$http']

    function loginService($http) {
        var req = ''
        var storedUser = ''

        var d = ''
        var expires = ''
        var name = ''
        var ca = ''
        var c = ''

        var service = {
            getUsers: getUsers,
            isAuthUser: isAuthUser,
            setCookie: setCookie,
            getCookie: getCookie
        }

        return service

        ////////////

        function getUsers() {
            return $http.get("Data/users.json")
                .then(getUsersSuccess)
                .catch(getUsersFailed)

            function getUsersSuccess(response) {
                return response;
            }

            function getUsersFailed(error) {
                console.log(error)
				alert("Error " + error.status + " \nURL " + error.statusText)
            }
        }

        function isAuthUser(response, username, password) {
            req = response

            for(var i = 0; i < req.data.users.length; i++) {
                storedUser = req.data.users[i]

                if((username == storedUser.username) && (password == storedUser.password)) {
                    return true
                }
            }

            return false
        }

        function setCookie(cname, cvalue, cexdays) {
            d = new Date()
            d.setTime(d.getTime() + (cexdays * 24 * 60 * 60 * 1000))
            
            expires = "expires=" + d.toUTCString();
            
            document.cookie = cname + '=' + cvalue + ';' + expires + ";path=/"
        }

        function getCookie(cname) {
            name = cname + '='
            ca = document.cookie.split(';')

            for(var i = 0; i < ca.length; i++) {
                c = ca[i]

                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
    
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }

            return "";
        }
    }
})