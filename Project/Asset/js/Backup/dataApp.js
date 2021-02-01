API_KEY = "8c54e9e9366789a5d38c369b9294f913"
baseURL = "https://api.themoviedb.org/3/"

/*Data Module--------------------------------------
-------------------------------------------------*/
let appData = angular.module('data', [])



/*Data Controller----------------------------------
-------------------------------------------------*/
appData.controller('dataCtrl', ['$scope', '$window', 'dataServices', 'detailServices', function($scope, $window, dataServices, detailServices) {
    $scope.username = ''
    $scope.configData = ''
    
    $scope.newMovie = dataServices.movie
    $scope.movies = []

    $scope.recordMovie = dataServices.movie

    //fetch config--------------------------------------------------
    dataServices.getConfig(baseURL).then(
        function successCallback(response) {
            $scope.configData = response.data
            console.log($scope.configData)
        },

        function errorCallback(response) {
            console.log(response)
            alert("Error: " + response.status + (" \nStatus Code: " + response.data.status_code + " \n" + response.data.status_message))
        }
    )
    //END OF fetch config--------------------------------------------------


    //Fetch now playing movies--------------------------------------------------
    angular.element(document).ready(function() {
        $scope.username = dataServices.getCookie("username")
        if(!dataServices.isValidUser($scope.username)){
            alert("You are not a valid user")
            $window.location.href="/login.html"
        }
        
        else {
            dataServices.getMovies(baseURL).then(
                function successCallback(response) {
                    dataServices.addMovies(response, $scope)
                },
        
                function errorCallback(response) {
                    console.log(response)
                    alert("Error: " + response.status + (" \nStatus Code: " + response.data.status_code + " \n" + response.data.status_message))
                }
            )
        }
    })
    //END OF Fetch now playing movies--------------------------------------------------


    $scope.logout = function() {
        dataServices.setCookie("username", "", 100)

        $window.location.href = '/login.html'
    }

    $scope.setRecordClick = function(movie) {
        detailServices.setRecordMovie(movie)
        $window.location.href = "/detail.html"
    }
}])



/*data services-----------------------------------------------
-----------------------------------------------------------*/
appData.factory('dataServices', ['$http', function($http) {
    //------------------------------------------------------------//

    let isValidUser = function(username) {
        if(username == '') {
            return false
        }

        return true;
    }

    let getConfig = function(baseURL) {
        return $http.get(baseURL + "configuration?api_key=" + API_KEY)
    }

    let setCookie = function(cname, cvalue, cexdays) {
		var d = new Date()
		d.setTime(d.getTime() - (cexdays * 24 * 60 * 60 * 1000))
		
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

    //------------------------------------------------------------//

    let getMovies = function(baseURL) {
        return $http.get(baseURL + "movie/now_playing?api_key=" + API_KEY + "&language=en-US&page=1")
    }

    let addMovies = function(response, $scope) {
        let req = response.data.results
        console.log(req)

        for(var i = 0; i < req.length; i++) {
            $scope.movies.push({
                id                  : req[i].id, 
                backdrop_path       : $scope.configData.images.base_url + $scope.configData.images.backdrop_sizes[2] + req[i].backdrop_path,
                poster_path         : $scope.configData.images.base_url + $scope.configData.images.poster_sizes[3] + req[i].poster_path,
                original_language   : req[i].original_language,
                original_title      : req[i].original_title,
                overview            : req[i].overview,
                popularity          : req[i].popularity,
                release_date        : req[i].release_date,
                title               : req[i].title,
                vote_average        : req[i].vote_average,
                vote_count          : req[i].vote_count
            })
        }
    }

    let movie = {
        id                  : "",
        backdrop_path       : "",
        poster_path         : "",
        original_language   : "",
        original_title      : "",
        overview            : "",
        popularity          : "",
        release_date        : "",
        title               : "",
        vote_average        : "",
        vote_count          : ""
    }

    //------------------------------------------------------------//

    return{
        isValidUser: isValidUser,

        getConfig: getConfig,
        setCookie: setCookie,
        getCookie: getCookie,

        getMovies: getMovies,
        addMovies: addMovies,
        movie
    }
}])



//---------------------------------------------------------------------------------//



/*Detail Controller----------------------------------------
-----------------------------------------------------------*/
appData.controller('detailCtrl', ['$scope', '$window', 'dataServices', 'detailServices', function($scope, $window, dataServices, detailServices) {
    $scope.movieDetails = ''
    $scope.configData = ''


    $scope.username = dataServices.getCookie("username")
    $scope.recordMovie = JSON.parse(detailServices.getRecordMovie())


    //fetch config--------------------------------------------------
    dataServices.getConfig(baseURL).then(
        function successCallback(response) {
            $scope.configData = response.data
            console.log($scope.configData)
        },

        function errorCallback(response) {
            console.log(response)
            alert("Error: " + response.status + (" \nStatus Code: " + response.data.status_code + " \n" + response.data.status_message))
        }
    )
    //END OF fetch config--------------------------------------------------


    detailServices.getMovieDetails(baseURL, $scope.recordMovie).then(
        function successCallback(response) {
            detailServices.addMovieDetails(response, $scope)
        },

        function errorCallback(response) {
            console.log(response)
            alert("Error: " + response.status + (" \nStatus Code: " + response.data.status_code + " \n" + response.data.status_message))
        }
    )

    $scope.logout = function() {
        dataServices.setCookie("username", "", 100)

        $window.location.href = '/login.html'
    }
}])



/*detail services-----------------------------------------------
-----------------------------------------------------------*/
appData.service('detailServices', ['$http', function($http) {
    this.recordMovie = {
        backdrop_path: "",
        poster_path: "",
        original_language: "",
        original_title: "",
        overview: "",
        popularity: "",
        release_date: "",
        title: "",
        vote_average: "",
        vote_count: ""
    }

    //------------------------------------------------------------//

    this.getMovieDetails = function(baseURL, recordMovie) {
        return $http.get(baseURL + "movie/" + recordMovie.id + "?api_key=" + API_KEY)
    }

    this.addMovieDetails = function(response, $scope) {
        let req = response.data
        console.log(req)

        $scope.movieDetails = {
            id                  : req.id,
            title               : req.title,
            release_date        : req.release_date,
            budget              : req.budget,
            homepage            : req.homepage,
            genres              : req.genres,
            tagline             : req.tagline,
            production_companies: req.production_companies
        }

        console.log($scope.movieDetails)
    }

    this.setRecordMovie = function(movie) {
        localStorage.setItem("recordMovie", JSON.stringify(movie))
    }

    this.getRecordMovie = function() {
        this.recordMovie = localStorage.getItem("recordMovie")

        return this.recordMovie
    }

    //------------------------------------------------------------//
}])