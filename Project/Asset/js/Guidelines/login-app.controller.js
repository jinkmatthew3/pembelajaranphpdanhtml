(function(angular) {
    'use strict'

    API_KEY = "8c54e9e9366789a5d38c369b9294f913"
    
    ////////////

    angular
        .module('login')
        .controller('LoginController', LoginController)

    LoginController.$inject = ['$window', 'loginService']

    function LoginController($window, loginService) {
        vm.username = ''
        vm.password = ''
        vm.isError = false

        ///////////

        angular.element(document).ready(function() {
            let username = loginService.getCookie("username")
    
            if(username != '') {
                $window.location.href = "/data.html"
            }
        })

        //Submit Form Login---------------------------------------------
        vm.submitLogin = function(username, password) {
            if(username == '' || password == '') {
                alert("Ga boleh kosong")
            }

            else {
                //XML HTTP REQUEST------------------------------
                loginService.getUsers()
                    .then(function(response) {
                        if(loginService.isAuthUser(response, username, password)) {
                            alert("Berhasil Login")
                            loginService.setCookie("username", username, 1)

                            vm.username = ''
                            vm.password = ''
                            document.getElementById("form").reset()

                            $window.location.href = '/data.html'
                        }

                        else {
                            alert("Tidak Berhasil Login")

                            vm.username = ''
                            vm.password = ''
                            vm.isError = true;
                            document.getElementById("form").reset()
                        }
                    })
                //END OF XML HTTP REQUEST-----------------------------------
            }
        }
        //END OF Submit Form Login---------------------------------------------
    }
})